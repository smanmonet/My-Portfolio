<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Role;
class ProductController extends Controller

{
    public function index(Request $request)
    {
        $ses = session()->all();
        $search = $request->search;
        $products = DB::table('product')
            ->where('productname', 'LIKE', "%$search%")
            ->get();
        //return view('product', compact('products', 'ses'));
        if($products->isEmpty()) {
            $message = "ไม่พบสินค้าที่คุณค้นหา";
            return view('product', compact('message', 'ses'));
        }
        return view('product', compact('products', 'ses')); 
    }
    public function stock(Request $request)
    {
        $search = $request->input('search');

        $products = DB::table('product')
        ->select('product.*', DB::raw('SUM(orderproduct.quantity) as stock_quantity'))
        ->leftJoin('orderproduct', 'product.productID', '=', 'orderproduct.productID')
        ->where(function ($query) use ($search) {
            $query->where('product.productname', 'like', '%' . $search . '%')
            ->orWhere('product.productID', 'like', '%' . $search . '%');
        })
        ->groupBy('product.productID', 'product.productname' , 'product.price', 'product.quantity', 'product.Min', 'product.PVPercent', 'product.image')
        ->get();
        $value = session()->get("id");
        $role = QueryBuilder::for(Role::class)
        ->leftJoin('roletype','role.roletypeID','=','roletype.roletypeID')
        ->where('role.empID',$value)
        ->get();
        return view('stock_store', compact('products','role'));
    }

    public function stock_edit()
    {

        $products = DB::table('product')->get();
        return view('stock_edit', compact('products'));
    }

    

    public function store(Request $request)
{
    // Validate incoming request
    $validator = Validator::make($request->all(), [
        'productname' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'Min' => 'required|string',
        'PVPercent' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        // Add more validation rules as per your requirements
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        Session::flash('popup_message', 'Create fail ! fill in information');

        // Redirect back to the view
        return redirect()->back();
    }

    try {
        // Create a new product instance
        $product = new Product();
        $product->productname = $request->productname;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->Min = $request->Min;
        $product->PVPercent = $request->PVPercent;

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName); // Save image in image folder
            $product->image = $imageName;
        }
        else {
            // If no image is uploaded, set a default image name
            $product->image = 'no-image.png';
        }

        // Save the product
        $product->save();

        // Redirect to a specific route after successful insertion
        
        return redirect()->route('stock_store')->with('success', 'Product created successfully!');
    } catch (\Exception $e) {
        Session::flash('popup_message', 'Create fail ! '+$e->getMessage());

        // Redirect back to the view
        return redirect()->back();
    }
}
    public function create()
    {
        return view('stock_create');
    }
    public function edit($id)
    {
    // Retrieve the product details based on the provided ID
    $products = Product::where('productID', $id)->firstOrFail();

    // Pass the product details to the edit view
    return view('stock_edit', compact('products'));
    }
    
    public function update(Request $request, $productID)
    {
    // Validate incoming request
    $validator = Validator::make($request->all(), [
        'productname' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'Min' => 'nullable|string',
        'PVPercent' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // Add more validation rules as per your requirements
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
            Session::flash('popup_message', 'Update fail ! fill in information');
    
            // Redirect back to the view
            return redirect()->back();
        }
    try {
        $products= Product::where('productID', $productID)->first(); // Find the item

if ($products) {
        $products->productname = $request->productname;
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->Min = $request->Min;
        $products->PVPercent = $request->PVPercent;

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->move(public_path('images'), $imageName);

            // Delete the old image if necessary
            // File::delete(public_path('images/' . $product->image));

            $products->image = $imageName; // Store new image name
        }
    $products->save(); // Save the updated item
} else {
    // Item not found
}

        // Redirect to a specific route after successful update
        return redirect()->route('stock_store')->with('success', 'Product updated successfully!');
    } catch (\Exception $e) {
        dd($e->getMessage());
        return Redirect::back()->withInput()->withErrors([$e->getMessage()]);
    }
}
    public function delete($id)
    {
    try {
    
        $product = Product::findOrFail($id);
        if($product->image != "no-image.png"){

            if ($product->image) {
                // Construct the full path to the image
                $imagePath = public_path('images/' . $product->image);
            
                // Delete the image
                if (file_exists($imagePath)) {
                unlink($imagePath);
                }
            }
        }

        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    } catch (\Exception $e) {
        
        return Redirect::back()->withErrors([$e->getMessage()]);
    }
}

}

