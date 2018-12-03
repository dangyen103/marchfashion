<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use App\Customer;
use App\Adminitrator;
use App\Role;

class UserController extends Controller
{
    public function dangnhapAdmin()
    {

    }

    public function dangxuatAdmin()
    {

    }

    public function getUserList()
    {
        $user_customers = User::where('level', 0)->get();
        $user_admins = User::where('level', 1)->get();

        // foreach ($user_admins as $item) {
        //     echo $item->name;
        //     echo "------------";
        //     foreach ($item->adminitrator->roles as $key) {
        //         echo $key->name;
        //         echo "------------";
        //         echo $key->pivot->role_id;
        //     }
        //     echo "<br>";
        // }

        // return view('admin.login');

        return view('admin.user.user-list', compact('user_customers','user_admins'));
    }

    public function getAdminAdd()
    {
        $roles = Role::all();
        return view('admin.user.user-add',compact('roles'));
    }

    public function postAdminAdd(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required',
            'email' => 'required|unique:users,email'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' =>'Email đã được sử dụng'

        ]);

        $new_user = new User;
        $new_admin = new Adminitrator;
        
        //create new user
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->level = 1;
        $new_user->password = str_random(8);

        //save user
        $new_user->save();
        
        //create new admin
        $new_admin->user_id = $new_user->id;
        $new_admin->status = $request->status;
        $new_admin->save();

        //attach records in pivot table
        foreach ($request->roles as $role_id) {
            $role = Role::find($role_id);
            $role->adminitrators()->attach($new_admin->id);
        }

        return redirect('admin/user/add')->with('alert-success','Thêm thành công');
    }

    public function getAdminEdit($id)
    {
        $user = User::find($id);
        $roles = Role::all();

        $admin_roles_arr = array();;

        foreach ($user->adminitrator->roles as $key => $item) {
            $admin_roles_arr[$key] = $item->id;
        }

        // echo json_encode($admin_roles_arr);

        return view('admin.user.user-edit', compact('user','roles','admin_roles_arr'));
    }

    public function postAdminEdit(Request $request, $id)
    {
        $this->validate($request,
        [
            'name'=>'required',
        ],
        [
            'name.required' => 'Bạn chưa nhập tên',

        ]);

        $user = User::find($id);
        $admin = $user->adminitrator;
        
        //edit user
        $user->name = $request->name;
        $user->save();
        
        //edit admin
        $admin->status = $request->status;
        $admin->save();

        //edit records in pivot table
        $admin->roles()->sync($request->roles);

        return redirect("admin/user/edit/$id")->with('alert-success','Sửa thành công');
    }
}
