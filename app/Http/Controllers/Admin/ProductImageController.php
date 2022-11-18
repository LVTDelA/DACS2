<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoffeeImage;
use App\Service\CoffeeProduct\CoffeeProductServiceInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    private  $productService;

    public function __construct(CoffeeProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($product_id)
    {

        $product = $this->productService->find($product_id);
        $productImages = $product-> productImages;
        return view('admin.product.image.index', compact('product','productImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id_product)
    {
        $data = $request->all();

//        Xử lí file:
        if ($request->hasFile('image')){
           $data['path'] = Common::uploadFile($request->file('image'),'front/img/products');
            unset($data['image']);

            CoffeeImage::create($data);
        }

        return redirect('admin/product/' . $id_product .'/image');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id,$product_image_id)
    {
//        Delete images:

        $file_name = CoffeeImage::find($product_image_id)->path;
        if ($file_name != ''){
            unlink('front/img/products/' .$file_name);
        }

//        Delete images in DB:
        CoffeeImage::find($product_image_id)->delete();

        return redirect('admin/product');
    }
}
