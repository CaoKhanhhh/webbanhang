<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\ProductGallery;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    public function index(Request $request){
        $keyword = $request->keyword;
        if($request->keyword){
            $products = Product::where('name', 'like', "%$request->keyword%")
                                ->paginate(20);
            $products->setPath(route('dashboard'));
            $products->withPath('?keyword=' . $request->keyword);
        }else{
            $products = Product::paginate(20);
        }
        
        return view('admin.product.index', compact('products', 'keyword'));
    }

    public function remove($id){
        $pro = Product::find($id);
        // dd($pro);die;
        $pro->delete();
        return redirect(route('ad-product.list'))->with('msg','Đã xóa!!!');
    }

    public function add(){
        $model = new Product();
        $cates = Category::all();

        return view('admin.product.add', compact('model', 'cates'));
    }

    public function edit($id){
        $model = Product::find($id);
        if(!$model){
            return "404 notfound";
        }
        $cates = Category::all();
        $galleries = ProductGallery::where('product_id', $id)->get();
        
        return view('admin.product.edit', compact('model', 'cates', 'galleries'));
    }
    public function postAdd(ProductRequest $request){
        $model = new Product();
        $model->fill($request->all());

        if($request->hasFile('image')){
            $filename = uniqid(). "." . $request->image->extension();
            $path = $request->image->storeAs('images/products', $filename);
            $model->image = $path;
        }

        $model->save();
        foreach($request->galleries as $gl){
            $galleryItem = new ProductGallery();
            $galleryItem->product_id = $model->id;
            $filename = uniqid(). "." . $gl->extension();
            $path = $gl->storeAs('images/galleries/pro_' . $model->id, $filename);
            $galleryItem->img_url = $path;
            $galleryItem->save();
        }
        return redirect(route('ad-product.list'));
    }
    public function postEdit(Request $request){
        $model = Product::find($request->id);
        $model->fill($request->all());

        if($request->hasFile('image')){
            // dat ten cho anh
            $filename = uniqid(). "." . $request->image->extension();
            // luu anh voi ten vua tao ra
            $path = $request->image->storeAs('images/products', $filename);
            $model->image = $path;
        }
        $model->save();
        return redirect(route('ad-product.list'));
    }

    public function uploadGallery(Request $request){
        $model = new ProductGallery();
        $model->product_id = $request->product_id;
        $filename = uniqid(). "." . $request->imageGallery->extension();
        $path = $request->imageGallery->storeAs('images/galleries/pro_' . $request->product_id, $filename);
        $model->img_url = $path;
        $model->save();

        return redirect(route('ad-product.edit', ['id' => $request->product_id]));
    }

    public function removeGallery(Request $request){
        $model = ProductGallery::find($request->id);
        $model->delete();
        return response()->json(['success' => true, 'id' => $request->id]);
    }
}