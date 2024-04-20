<?php

namespace App\Http\Controllers\Administration;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\CarBrand;
use App\Models\CarType;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\SubCategory;
use DateTime;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        if ($request->file()) {
            $image = $request->file('image'); // Corrected file field name
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'), $image_name);
            $image_path = "/image/" . $image_name;
        }
        $data['image']=$image_path;
        Product::create($data);
        return redirect()->route('admin.products.index');
    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('admin.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        if ($request->file()) {
            $image = $request->file('image'); // Corrected file field name
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/image'), $image_name);
            $image_path = "/image/" . $image_name;
        }
        $data['image']= $image_path ?? $product->image;
        $product->update($data);
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    public function filter(Request $request)
    {
       
       
        $products = Product::with('category')
        ->whereDate('created_at', '>=',  $request->fromDate)
        ->whereDate('created_at', '<=',  $request->toDate)
        ->get();
        return response()->json(['products' => $products]);
    }

    public function bulkDelete(Request $request)
    {
        $validatedData = $request->validate([
            'selectedProducts.*' => 'required|exists:products,id'
        ]);

        $productIds = $validatedData['selectedProducts'];

        Product::whereIn('id', $productIds)->delete();

        return redirect()->back()->with('success', 'Selected products have been deleted successfully.');
    }
}
