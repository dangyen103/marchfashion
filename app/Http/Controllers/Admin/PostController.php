<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        
    }

    public function getPostList()
    {
        $posts = Post::all();
        return view('admin.post.post-list', compact('posts'));
    }

    public function getPostDetail($id)
    {
        $post = Post::find($id);
        return view('admin.post.post-detail', compact('post'));
    }

    public function getPostAdd()
    {
        return view('admin.post.post-add');
    }

    public function postPostAdd(Request $request)
    {
        $this->validate($request,
        [
            'title' => 'required|unique:posts,title|max:190',
            'thumbnail'=>'required',
            'description'=>'required|max:190',
            'content'=>'required'

        ],
        [
            'title.required' => 'Bạn chưa nhập tiêu đề bài viết',
            'title.unique' => 'Tên tiêu đề đã tồn tại',
            'title.max' => 'Tên tiêu đề quá dài. Vui lòng nhập không quá 190 ký tự',
            'description.required' => 'Bạn chưa nhập mô tả bài viết',
            'description.max' => 'Mô tả quá dài. Vui lòng nhập không quá 190 ký tự',
            'thumbnail.required' => 'Bạn chưa thêm ảnh đại diện cho bài viết',
            'content.required' => 'Bài viết chưa có nội dung',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->unsigned_title = strToUnsigned($request->title);
        $post->description = $request->description;
        $post->content = $request->content;

        //upload thumnail
        $thumbnail_file = $request->file('thumbnail');
        $thumbnail_name = $thumbnail_file->getClientOriginalName();
        $thumbnail = str_random(5)."-".$thumbnail_name;
        
        //year + month folder directory
        $date = getdate();
        $cur_year = $date['year'];
        $cur_month = date('m', strtotime($date['month']));

        $directoryName = "uploads/posts/$cur_year/$cur_month";

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
        $post->image = "$cur_year/$cur_month/$thumbnail";

        //save product
        $post->save();

        return redirect("admin/post/add")->with('alert-success','Đã lưu bài viết!');
    }

    public function getPostEdit($id)
    {
        $post = Post::find($id);

        return view('admin.post.post-edit', compact('post'));
    }

    public function postPostEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'title' => 'required|max:190',
            'description'=>'required|max:190',
            'content'=>'required'

        ],
        [
            'title.required' => 'Bạn chưa nhập tiêu đề bài viết',
            'title.max' => 'Tên tiêu đề quá dài. Vui lòng nhập không quá 190 ký tự',
            'description.required' => 'Bạn chưa nhập mô tả bài viết',
            'description.max' => 'Mô tả quá dài. Vui lòng nhập không quá 190 ký tự',
            'content.required' => 'Bài viết chưa có nội dung',
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->unsigned_title = strToUnsigned($request->title);
        $post->description = $request->description;
        $post->content = $request->content;

        //year + month folder directory
        $date = getdate();
        $cur_year = $date['year'];
        $cur_month = date('m', strtotime($date['month']));

        $directoryName = "uploads/posts/$cur_year/$cur_month";

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
            unlink('uploads/posts/'.$post->image);
            //save to db
            $post->image = "$cur_year/$cur_month/$thumbnail";
        }

        //save product
        $post->save();

        return redirect("admin/post/$post->id/$post->unsigned_title/edit")->with('alert-success','Đã lưu chỉnh sửa!');
    }

    public function getPostDelete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect("admin/post")->with('alert-success','Xóa thành công!');
    }
}
