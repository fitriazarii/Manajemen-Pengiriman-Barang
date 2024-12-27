<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'nullable|exists:categories,id',
            'category_name' => 'required_without:category_id|min:3',
            'category_description' => 'nullable'
        ]);

        $categoryId = $request->category_id;
        if (is_null($categoryId)) {
            $category = Category::create([
                'name' => $request->category_name,
                'description' => $request->category_description,
                'product_count' => 0
            ]);
            $categoryId = $category->id;
        }

        $image = $request->file('image');
        $image->storeAs('products', $image->hashName());

        Product::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $categoryId
        ]);

        Category::find($categoryId)->increment('product_count');

        return redirect()->route('products.index')->with(['success' => 'Successfully Added Product!']);
    }


    public function show(string $id): View
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|exists:categories,id'
        ]);

        $product = Product::findOrFail($id);
        $oldCategoryId = $product->category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('products', $image->hashName());
            Storage::delete('products/' . $product->image);

            $product->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'category_id' => $request->category_id
            ]);
        } else {
            $product->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'category_id' => $request->category_id
            ]);
        }

        if ($oldCategoryId != $request->category_id) {
            Category::find($oldCategoryId)->decrement('product_count');
            Category::find($request->category_id)->increment('product_count');
        }

        return redirect()->route('products.index')->with(['success' => 'Successfully Updated Product!']);
    }

    public function destroy($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        Storage::delete('products/' . $product->image);
        $category = Category::find($product->category_id);
        $product->delete();
        $category->decrement('product_count');

        return redirect()->route('products.index')->with(['success' => 'Successfully Deleted Product!']);
    }
}
