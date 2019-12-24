<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::with(['parent'])->orderBy('created_at', 'DESC')->paginate(10);
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();
        return view('admin.category', compact('category','parent'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories'
        ]);

        $request->request->add(['slug' => $request->name]);

        Category::create($request->except('_token'));
        return redirect(route('category.index'))->with(['success' => 'Kategori Baru ditambahkan!']);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        
        $parent = Category::getParent()->orderBy('name', 'ASC')->get();
        return view ('admin.categories.edit', compact('category', 'parent'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:categories,name,' . $id
        ]);

        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
            'parent_id' =>$request->parent_id
        ]);

        return redirect(route('category.index'))->with(['Success' => 'Kategori Diperbaharui!']);
    }

    public function destroy($id)
    {
        $category = Category::withCount(['child'])->find($id);
        if ($category->child_count == 0){
            $category->delete();
            return redirect(route('category.index'))->with(['success' => 'Kategori dihapus!']);
        }

        return redirect(route('category.index'))->with(['error' => 'Kategori ini Memiliki anak Kategori!']);
    }
}
