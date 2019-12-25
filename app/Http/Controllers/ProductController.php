<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ProductJob;
Use File;


class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with(['category'])->orderBy('created_at', 'DESC');

        if  (request()->q != ''){
            $product = $product->where('name', 'LIKE', '%' .request()->q . '%');
        }
        $product = $product->paginate(10);

        return view('admin.products.product', compact('product'));
    }

    public function create()
    {
        $category = Category::orderBy('name', 'DESC')->get();

        return view('admin.products.create', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $filename);

            $product = Product::create([
                'name' => $request->name,
                'slug' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'image' => $filename,
                'price' => $request->price,
                'weight' => $request->weight,
                'status' => $request->status
            ]);

            return redirect(route('product.index'))->with(['success' => 'Produk Baru Ditambahkan']);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete(storage_path('app/public/products/' . $product->image));
        //KEMUDIAN HAPUS DATA PRODUK DARI DATABASE
        $product->delete();
        //DAN REDIRECT KE HALAMAN LIST PRODUK
        return redirect(route('product.index'))->with(['success' => 'Produk Sudah Dihapus']);
    }

    public function massUploadForm()
    {
        $category = Category::orderBy('name', 'DESC')->get();
        return view ('admin.products.bulk', compact('category'));
    }

    public function massUpload  (Request $request)
    {
        //Validasi data yang Dikirim (Format .xlsx)
        $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|mimes:xlsx'
        ]);

        //Jika File sudah tervalidasi
        if ($request->hasFile('file')){
            $file = $request->file('file');
            $filename = time() . '-product.' .$file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $filename);

            ProductJob::dispatch($request->category_id, $filename);
            return redirect()->back()->with(['success' => 'Upload Foto Terjadwalkan']);
        }
    }

    public function edit ($id)
    {
        $product = Product::find($id);
        $category = Category::orderBy('name', 'DESC')->get();
        return view('admin.products.edit', compact('product', 'category'));
    }

    public function update (Request $request, $id)
    {
        //Validasi Data yang telah dikirim
        $this->validate($request,[
            'name' => 'required|string|max:100',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'image' => 'nullable|image|mimes:png,jpeg,jpg' //Image bisa dibuat kosong dengan (nullable)

        ]);

        $product = Product::find($id); //Ambil data produk yang akan diedit berdasarkan ID
        $filename = $product->image; //Simpan Sementara Nama file Image saat ini

        //Jika ada file gambar dikirim
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            //Maka Upload File Tersebut
            $file->storeAs('public/products', $filename);
            //dan Hapus file gambar yang lama
            File::delete(storage_path('app/public/products/'. $product->image));
        }

        //Kemudian update produk tersebut

        $product->update([
            'name' =>$request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'weight' => $request->weight,
            'image' => $filename


        ]);
        //Pesan yang diberikan sistem Ketika Status Sukses
        return redirect(route('product.index'))->with(['success' => 'Data Produk Sukses Diperbaharui']);
    }
}
