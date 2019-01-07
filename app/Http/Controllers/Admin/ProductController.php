<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductDetail;
use Gate;

class ProductController extends Controller
{
    public function getProductList()
    {
        if (Gate::check('prod-manager') || Gate::check('set-manager') || 
            Gate::check('disc-manager') || Gate::check('order-manager') ||
            Gate::check('confirmOrder') || Gate::check('packingOrder'))
        {
            $all_products = Product::all();

            $top = Product::whereHas('category', function ($query) {
                $query->where('type', 0);
            })->get();

            $pants = Product::whereHas('category', function ($query) {
                $query->where('type', 1);
            })->get();

            $dress = Product::whereHas('category', function ($query) {
                $query->where('type', 2);
            })->get();

            $set = Product::whereHas('category', function ($query) {
                $query->where('type', 3);
            })->get();

            $accessories = Product::whereHas('category', function ($query) {
                $query->where('type', 4);
            })->get();

            return view('admin.product.product-list', 
                    compact('all_products', 'top', 'pants', 'dress', 'set', 'accessories'));
        }
        else {
            abort(403);
        }
    }

    public function getProductDetail($id)
    {
        if (Gate::check('prod-manager') || Gate::check('set-manager') || 
            Gate::check('disc-manager') || Gate::check('order-manager') ||
            Gate::check('confirmOrder') || Gate::check('packingOrder'))
        {
            $product = Product::find($id);
            return view('admin.product.product-detail', compact('product'));
        }
        else {
            abort(403);
        }
    }

    public function getProductAdd()
    {
        $this->authorize('prod-manager');
        $cates = Category::all();
        return view('admin.product.product-add',compact('cates'));
    }

    public function postProductAdd(Request $request)
    {
        $this->authorize('prod-manager');
        
        $this->validate($request,
        [
            'name'=>'required|unique:products|max:190',
            'category' => 'required',
            'price' => 'required|integer',
            'images' => 'required',
            'label' => 'max:190'

        ],
        [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'name.max' => 'Tên sản phẩm quá dài. Vui lòng nhập không quá 190 ký tự',
            'category.required' => 'Bạn chưa chọn loại sản phẩm',
            'price.required' => 'Bạn chưa nhập giá sản phẩm',
            'price.integer' => 'Giá sản phẩm đã nhập không phải một số nguyên',
            'images.required' => 'Bạn chưa chọn ảnh sản phẩm',
            'label' => 'Quá nhiều nhãn. Hãy đảm bảo chúng không vượt quá 190 ký tự'
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->unsigned_name = strToUnsigned($request->name);
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->label = $request->label;

        //upload thumnail
        $thumbnail_file = $request->file('thumbnail');
        $thumbnail_name = $thumbnail_file->getClientOriginalName();
        $thumbnail = str_random(5)."-".$thumbnail_name;
        
        //year + month folder directory
        $date = getdate();
        $cur_year = $date['year'];
        $cur_month = date('m', strtotime($date['month']));

        $directoryName = "uploads/products/$cur_year/$cur_month";

        if(!is_dir($directoryName)){
            //Directory does not exist, so lets create it.
            mkdir($directoryName, 0755, true);
        }

        //check existed file
        while (file_exists($directoryName.$thumbnail)) 
        {
            $thumbnail = str_random(5)."-".$name;
        }
        $thumbnail_file->move($directoryName, $thumbnail);
        $product->thumbnail = "$cur_year/$cur_month/$thumbnail";

        //save product
        $product->save();


        //save product detail
        $sizes = $request->size;
        $colors = $request->color;
        $quantity = $request->quantity;

        foreach ($colors as $key => $color) {

            $product_detail = new ProductDetail;

            $product_detail->product_id = $product->id;
            $product_detail->color = $color;
            $product_detail->size = $sizes[$key];
            $product_detail->quantity = $quantity[$key];

            $product_detail->save();
        }

        //save product images
        $images = $request->file('images');

        if($request->hasFile('images'))
        {
            foreach ($images as $image) 
            {
                $image_name = $image->getClientOriginalName();
                $image_save_name = str_random(5)."-".$image_name;
    
                //check existed file
                while (file_exists($directoryName.$image_save_name)) 
                {
                    $image_save_name = str_random(5)."-".$image_name;
                }
                $image->move($directoryName, $image_save_name);
    
                //creat new product image
                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->image = "$cur_year/$cur_month/$image_save_name";
                
                $product_image->save();
            }
        }

        return redirect("admin/product/add")->with('alert-success','Thêm sản phẩm thành công!');
    }

    public function getProductEdit($id)
    {
        $this->authorize('prod-manager');

        $cates = Category::all();
        $product =  Product::find($id);
        return view('admin.product.product-edit', compact('product','cates'));
    }

    public function postProductEdit(Request $request, $id)
    {
        $this->authorize('prod-manager');

        $this->validate($request,
        [
            'name'=>'required|max:190',
            'category' => 'required',
            'price' => 'required|integer',
            'label' => 'max:190'

        ],
        [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.max' => 'Tên sản phẩm quá dài. Vui lòng nhập không quá 190 ký tự',
            'category.required' => 'Bạn chưa chọn loại sản phẩm',
            'price.required' => 'Bạn chưa nhập giá sản phẩm',
            'price.integer' => 'Giá sản phẩm đã nhập không phải một số nguyên',
            'label' => 'Quá nhiều nhãn. Hãy đảm bảo chúng không vượt quá 190 ký tự'
        ]);
        
        $product = Product::find($id);
        $product->name = $request->name;
        $product->unsigned_name = strToUnsigned($request->name);
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->label = $request->label;
        
        //year + month folder directory
        $date = getdate();
        $cur_year = $date['year'];
        $cur_month = date('m', strtotime($date['month']));

        $directoryName = "uploads/products/$cur_year/$cur_month";

        if(!is_dir($directoryName)){
            //Directory does not exist, so lets create it.
            mkdir($directoryName, 0755, true);
        }

        //upload thumnail
        $thumbnail_file = $request->file('thumbnail');

        if ($request->hasFile('thumbnail')) 
        {
            $thumbnail_name = $thumbnail_file->getClientOriginalName();
            $thumbnail = str_random(5)."-".$thumbnail_name;

            //check existed file
            while (file_exists($directoryName.$thumbnail)) 
            {
                $thumbnail = str_random(5)."-".$name;
            }
            //save new thumbnail into folder
            $thumbnail_file->move($directoryName, $thumbnail);
            //remove old thumbnail out of folder
            unlink('uploads/products/'.$product->thumbnail);
            //save to db
            $product->thumbnail = "$cur_year/$cur_month/$thumbnail";
        }

        //save product
        $product->save();


        //delete product details
        foreach ($product->product_details as $item) {
            $item->delete();
        }

        //add new product detail
        $sizes = $request->size;
        $colors = $request->color;
        $quantity = $request->quantity;

        foreach ($colors as $key => $color) {

            $product_detail = new ProductDetail;

            $product_detail->product_id = $product->id;
            $product_detail->color = $color;
            $product_detail->size = $sizes[$key];
            $product_detail->quantity = $quantity[$key];

            $product_detail->save();
        }

        //check change of product old images
        $old_images = $request->old_images;
        if (!empty($old_images)) {
            foreach ($product->images as $item) 
            {
                if (!in_array($item->id, $old_images))
                {
                    unlink("uploads/products/$item->image");
                    $item->delete();
                }
            }
        } 
        else 
        {
            foreach ($product->images as $item)
            {
                unlink("uploads/products/$item->image");
                $item->delete();
            }
        }

        //save product new images
        $new_images = $request->file('new_images');

        if($request->hasFile('new_images'))
        {
            foreach ($new_images as $image) 
            {
                $image_name = $image->getClientOriginalName();
                $image_save_name = str_random(5)."-".$image_name;
    
                //check existed file
                while (file_exists($directoryName.$image_save_name)) 
                {
                    $image_save_name = str_random(5)."-".$image_name;
                }
                $image->move($directoryName, $image_save_name);
    
                //creat new product image
                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->image = "$cur_year/$cur_month/$image_save_name";
                
                $product_image->save();
            }
        }

        return redirect("admin/product/$product->id/$product->name/edit")->with('alert-success','Sửa sản phẩm thành công!');
    }

    public function getProductDelete($id)
    {
        $this->authorize('prod-manager');
    }
}