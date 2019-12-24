<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
}
