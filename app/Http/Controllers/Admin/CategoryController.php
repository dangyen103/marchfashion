<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function getCategoryList()
    {
        $categories = Category::all();
        return view('admin.category.category-list', compact('categories'));
    }

    public function getCategoryAdd()
    {
        return view('admin.category.category-add');
    }

    public function postCategoryAdd(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required|unique:categories,name|max:190',
            'type'=>'required'

        ],
        [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.max' => 'Tên quá dài. Vui lòng nhập không quá 190 ký tự',
            'type.required' => 'Bạn chưa chọn loại danh mục',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->type = $request->type;
        $category->save();

        return redirect("admin/category/add")->with('alert-success','Thêm danh mục mới thành công!');
    }

    public function getCategoryEdit($id)
    {
        $category = Category::find($id);

        return view('admin.category.category-edit', compact('category'));
    }

    public function postCategoryEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'name'=>'required|exists:categories,name|max:190',
            'type'=>'required'

        ],
        [
            'name.required' => 'Bạn chưa nhập tên danh mục',
            'name.exists' => 'Tên danh mục đã tồn tại',
            'name.max' => 'Tên quá dài. Vui lòng nhập không quá 190 ký tự',
            'type.required' => 'Bạn chưa chọn loại danh mục',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->type = $request->type;
        $category->save();

        return redirect("admin/category/add")->with('alert-success','Sửa thành công!');
    }

    public function getCategoryDelete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect("admin/category")->with('alert-success','Xóa thành công!');
    }
}
