<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Payment;
use Carbon\Carbon;
use App\Mail\OrderMail;
use Mail;
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

        // if (\Gate::forUser(auth()->guard('customer')->user())->allows('order-view', $order)){
        //     return view('ecommerce.orders.view', compact('order'));
        // }
        return view('ecommerce.orders.view', compact('order'));
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
            
            $order = Order::where('invoice', $request->invoice)->first();
            
            if ($order->subtotal != $request->amount) return redirect()->back()->with(['error' => 'Error, Pembayaran Harus Sama Dengan Tagihan']);
            if ($order->status == 0 && $request->hasFile('proof')) {
            
                $file = $request->file('proof');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/payment', $filename);
    
            
                Payment::create([
                    'order_id' => $order->id,
                    'name' => $request->name,
                    'transfer_to' => $request->transfer_to,
                    'transfer_date' => Carbon::parse($request->transfer_date)->format('Y-m-d'),
                    'amount' => $request->amount,
                    'proof' => $filename,
                    'status' => false
                ]);
            
                $order->update(['status' => 1]);
            
                DB::commit();
            
                return redirect()->back()->with(['success' => 'Pesanan Dikonfirmasi']);
            }
            
            return redirect()->back()->with(['error' => 'Error, Upload Bukti Transfer']);
        } catch(\Exception $e) {
            
            DB::rollback();
            
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function pdf($invoice)
    {
        $order = Order::with(['district.city.province', 'details', 'details.product', 'payment']) 
        ->where('invoice', $invoice)->first();

        //Pencegaan hanya usernya saja yang bisa akses PDF
        // if (!\Gate::forUser(auth()->guard('customer')->user())->allows('order-view', $order)){
        //     return redirect(route('customer.view_order', $order->invoice));
        // }

        $pdf = PDF::loadView('ecommerce.orders.pdf', compact('order'));
        return $pdf->stream();
    }
 
    public function shippingOrder(Request $request)
    {
        $order = Order::with(['customer'])->find($request->order_id);
        $order->update(['tracking_number' => $request->tracking_number, 'status' => 3]);
        Mail::to($order->customer->email)->send(new OrderMail($order));
        return redirect()->back();
    }
}
