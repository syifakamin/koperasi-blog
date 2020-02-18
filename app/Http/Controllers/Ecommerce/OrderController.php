<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Payment;
use Carbon\Carbon;
use DB;
use PDF;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::where('customer_id', auth()->guard('customer')->user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('ecommerce.orders.index', compact('orders'));
    }

    public function view($invoice)
    {
        $order = Order::with(['district.city.province', 'details', 'details.product', 'payment'])
        ->where('invoice', $invoice)->first();

        if (\Gate::forUser(auth()->guard('customer')->user())->allows('order-view', $order)){
            return view('ecommerce.orders.view', compact('order'));
        }

    }

    public function paymentForm()
    {
        return view('ecommerce.payment');
    }
    

    public function storePayment(Request $request)
    {
        $this->validate($request,[
            'invoice' => 'required|exists:orders,invoice',
        'name' => 'required|string',
        'transfer_to' => 'required|string',
        'transfer_date' => 'required',
        'amount' => 'required|integer',
        'proof' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        DB::beginTransaction();
        try {
            //AMBIL DATA ORDER BERDASARKAN INVOICE ID
            $order = Order::where('invoice', $request->invoice)->first();
            //JIKA STATUSNYA MASIH 0 DAN ADA FILE BUKTI TRANSFER YANG DI KIRIM
            if ($order->subtotal != $request->amount) return redirect()->back()->with(['error' => 'Error, Pembayaran Harus Sama Dengan Tagihan']);
            if ($order->status == 0 && $request->hasFile('proof')) {
                //MAKA UPLOAD FILE GAMBAR TERSEBUT
                $file = $request->file('proof');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/payment', $filename);
    
                //KEMUDIAN SIMPAN INFORMASI PEMBAYARANNYA
                Payment::create([
                    'order_id' => $order->id,
                    'name' => $request->name,
                    'transfer_to' => $request->transfer_to,
                    'transfer_date' => Carbon::parse($request->transfer_date)->format('Y-m-d'),
                    'amount' => $request->amount,
                    'proof' => $filename,
                    'status' => false
                ]);
                //DAN GANTI STATUS ORDER MENJADI 1
                $order->update(['status' => 1]);
                //JIKA TIDAK ADA ERROR, MAKA COMMIT UNTUK MENANDAKAN BAHWA TRANSAKSI BERHASIL
                DB::commit();
                //REDIRECT DAN KIRIMKAN PESAN
                return redirect()->back()->with(['success' => 'Pesanan Dikonfirmasi']);
            }
            //REDIRECT DENGAN ERROR MESSAGE
            return redirect()->back()->with(['error' => 'Error, Upload Bukti Transfer']);
        } catch(\Exception $e) {
            //JIKA TERJADI ERROR, MAKA ROLLBACK SELURUH PROSES QUERY
            DB::rollback();
            //DAN KIRIMKAN PESAN ERROR
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function pdf($invoice)
    {
        $order = Order::with(['district.city.province', 'details', 'details.product', 'payment']) 
        ->where('invoice', $invoice)->first();

        if (!\Gate::forUser(auth()->guard('customer')->user())->allows('order-view', $order)){
            return redirect(route('customer.view_order', $order->invoice));
        }

        $pdf = PDF::loadView('ecommerce.orders.pdf', compact('order'));
        return $pdf->stream();
    }
    
}
