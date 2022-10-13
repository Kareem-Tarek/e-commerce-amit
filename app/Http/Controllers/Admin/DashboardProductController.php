<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class DashboardProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('created_at','asc')->paginate(30);

        return view('dashboard.products.index',compact('products'));
    }

    public function create()
    {
        return view('dashboard.products.create');
    }

    public function store(Request $request)
    {

        // $product = Product::create([
        //     'name' => $input['name'],
        //     'slug' => $input['slug'],
        //     'description' => $input['description'],
        //     'image_name' => $input['image_name'],
        //     'price' => $input['price'],
        //     'sale_price' => $input['sale_price'],
        //     'clothing_type' => $input['clothing_type'],
        //     'is_accesory' => $input['is_accesory'],
        //     'product_category' => $input['product_category'],
        // ]);

        // $request->validate([
        //     'name'             => 'required',
        //     'description'      => 'required',
        //     'image_name'       => 'required',
        //     'price'            => 'required',
        //     'clothing_type'    => 'required',
        //     'is_accesory'      => 'required',
        //     'product_category' => 'required',
        // ]);

        $products                   = new Product();
        $products->name             = $request->name;
        $products->description      = $request->description;
        // if($request->hasFile('image_name')){
        //     $file       = $request->file('image_name');
        //     $extension  = $file->getClientOriginalExtension();
        //     $filename   = time().'.'.$extenstion;
        //     $file->move('assets/images/' , $filename);
        //     $products->image_name = $filename;
        // }
        // else{
        //     return $request;
        //     $products->image_name = '';
        // }
        $products->image_name       = "assets/images/".$request->image_name;
        $products->price            = $request->price;
        $products->clothing_type    = $request->clothing_type;
        $products->is_accessory     = $request->is_accessory;
        $products->product_category = $request->product_category;
        $products->create_user_id   = auth()->user()->id;
        $products->save();

        return redirect()->route('products.index')
            ->with(['message' => "($products->name) - Added successfully!"]);
    }


    public function edit($id)
    {
        $model = Product::findOrFail($id);

        return view('dashboard.products.edit',compact('model'));
    }


    public function update(Request $request, $id)
    {
        $products                   = Product::findOrFail($id);
        $products->name             = $request->name;
        $products->description      = $request->description;
        $products->image_name       = "assets/images/".$request->image_name;
        $products->price            = $request->price;
        $products->clothing_type    = $request->clothing_type;
        $products->is_accessory     = $request->is_accessory;
        $products->product_category = $request->product_category;
        $products->update_user_id   = auth()->user()->id;
        $products->save();

        return redirect()->route('products.index')
            ->with(['message' => "($products->name) - Edited successfully!"]);
    }


    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->route('products.index')
            ->with(['message' => "($products->name) - Deleted successfully!"]);
    }

    public function delete()
    {
        $products = Product::orderBy('created_at','asc')->onlyTrashed()->paginate(30);

        return view('dashboard.products.delete',compact('products'));
    }

    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        $products = Product::findOrFail($id);
        return redirect()->route('products.delete')
            ->with(['message' => "($products->name) - Restored successfully!"]);
    }

    public function forceDelete($id)
    {
        Product::where('id', $id)->forceDelete();
        return redirect()->route('products.delete')
            ->with(['message' => 'Permanently deleted successfully!']);
    }

}
