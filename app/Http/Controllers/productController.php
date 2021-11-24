<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsGellery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::where('status',1)->get();

        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::all();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required',
            'product_price'=>'required|numeric',
            'category'=>'required'
        ]);


        DB::transaction(function () use ($request) {

            $id = Str::random(5);

            $product = Product::create([
                'id'=>$id,
                'product_name'=>$request->product_name,
                'product_price'=>$request->product_price,
                'product_description'=>$request->prodcut_description,
                'category_id'=>$request->category
            ]);

            if($request->hasFile('image'))
            {
                foreach($request->file('image') as $image)
                {
                    $file_extention = $image->getClientOriginalExtention();
                    $file_name = $id.'.'.$file_extention;
                    $image->move(public_path('products'),$file_name);

                    ProductsGellery::create([
                        'product_id'=>$product->id,
                        'image'=>$file_name
                    ]);
                }
            }

        });

        return back()->with(['message'=>'product uploaded successfuly','type'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name'=>'required',
            'product_price'=>'required|numeric',
            'category'=>'required'
        ]);

        $product = Product::findOrFail($id);

        DB::transaction(function () use ($request, $id){

            Product::where('id',$id)->update([
                'product_name'=>$request->product_name,
                'product_price'=>$request->product_price,
                'product_description'=>$request->prodcut_description,
                'category_id'=>$request->category_id
            ]);

        });

        return back()->with(['message'=>'product updated succesfuly','type'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return back()->wit(['messgae'=>'Product deleted successfuly','type'=>'success']);
    }
}
