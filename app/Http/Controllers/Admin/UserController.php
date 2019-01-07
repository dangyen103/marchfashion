<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AdminPasswordMail;
use App\User;
use App\Customer;
use App\Adminitrator;
use App\Role;
use App\ThemeSetting;
use Mail;

class UserController extends Controller
{
    public function getAdminLogin()
    {
        return view('admin.login');
    }

    public function postAdminLogin(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'Bạn chưa nhập địa chỉ e-mail',
            'password.required' => 'Bạn chưa nhập mật khẩu'
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            $user = Auth::user();
            if ($user->level == 1) {
                foreach ($user->adminitrator->roles as $role) {
                    if($role->code == 'adminitrator')
                    {
                        return redirect('admin/user');
                    }
    
                    if($role->code == 'prodManager')
                    {
                        return redirect('admin/product');
                    }
    
                    if($role->code == 'setManager')
                    {
                        return redirect('admin/set');
                    }
    
                    if($role->code == 'discManager')
                    {
                        return redirect('admin/discount');
                    }
    
                    if($role->code == 'postManager')
                    {
                        return redirect('admin/post');
                    }
    
                    if($role->code == 'orderManager')
                    {
                        return redirect('admin/order');
                    }
    
                    if($role->code == 'confirmOrder')
                    {
                        return redirect('admin/order/confirm');
                    }
    
                    if($role->code == 'packingOrder')
                    {
                        return redirect('admin/order/packing');
                    }
    
                    if($role->code == 'shippingOrder')
                    {
                        return redirect('admin/order/shipping');
                    }
                }
            } 
            else {
                return redirect('admin/login')->with('alert-danger','Sai thông tin đăng nhập');
            }
            
           
        }
        else
        {
            return redirect('admin/login')->with('alert-danger','Sai thông tin đăng nhập');
        }
    }

    public function getAdmin(){

        $user = Auth::user();
        
        foreach ($user->adminitrator->roles as $role) {
            if($role->code == 'adminitrator')
            {
                return redirect('admin/user');
            }

            if($role->code == 'prodManager')
            {
                return redirect('admin/product');
            }

            if($role->code == 'setManager')
            {
                return redirect('admin/set');
            }

            if($role->code == 'discManager')
            {
                return redirect('admin/discount');
            }

            if($role->code == 'postManager')
            {
                return redirect('admin/post');
            }

            if($role->code == 'orderManager')
            {
                return redirect('admin/order');
            }

            if($role->code == 'confirmOrder')
            {
                return redirect('admin/order/confirm');
            }

            if($role->code == 'packingOrder')
            {
                return redirect('admin/order/packing');
            }

            if($role->code == 'shippingOrder')
            {
                return redirect('admin/order/shipping');
            }
        }
    }

    public function getAdminLogout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    public function getUserList()
    {
        $user_customers = User::where('level', 0)->get();
        $user_admins = User::where('level', 1)->get();

        return view('admin.user.user-list', compact('user_customers','user_admins'));
    }

    public function getUserDetail($id)
    {
        $user = User::find($id);

        return view('admin.user.customer-detail', compact('user'));
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
            'name'=>'required|max:100',
            'email' => 'required|unique:users,email'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên',
            'name.max' => 'Tên quá dài. Vui lòng nhập không quá 100 kí tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' =>'Email đã được sử dụng'

        ]);

        $new_user = new User;
        $new_admin = new Adminitrator;
        $user_password = str_random(8);
        
        //create new user
        $new_user->name = $request->name;
        $new_user->email = $request->email;
        $new_user->level = 1;
        $new_user->password = Hash::make($user_password);

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

        //send email
        $email = new AdminPasswordMail($new_user->name, $user_password);
        Mail::to($new_user->email)->send($email);

        return redirect('admin/user/add')->with('alert-success','Thêm thành công!');
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

        return redirect("admin/user/$id/edit")->with('alert-success','Sửa thành công!');
    }

    public function getAdminDelete($id)
    {
        $u = User::find($id);
        $u->delete();

        return redirect('admin/user')->with('alert-success','Xóa thành công!');
    }

    public function getAdminChangePassword()
    {
        return view('admin.change-password');
    }

    public function postAdminChangePassword(Request $request)
    {
        $user = Auth::user();

        if(Hash::check($request->current_password, $user->password)){
            if ($request->newpassword == $request->confirm_newpassword) {

                $this->validate($request,
                [
                    'newpassword' => 'min:8|max:190',
                ],
                [
                    'newpassword.min' => 'Mật khẩu phải có ít nhất 8 kí tự',
                    'newpassword.max' => 'Mật khẩu quá dài. Vui lòng nhập không quá 190 kí tự'

                ]);

                $user->password = Hash::make($request->newpassword);
                $user->save();
            }
            else {
                return redirect()->back()->with('alert-danger', 'Xác nhận mật khẩu mới không trùng khớp');
            }
        }
        else {
            return redirect()->back()->with('alert-danger', 'Mật khẩu không đúng');
        }

        return redirect('admin/change-password')->with('alert-success','Đổi mật khẩu thành công!');
    }

    public function getThemeSetting()
    {
        $theme = ThemeSetting::find(1);
        $contact_phones = explode("*", $theme->contact_phone);
        $shop_addresses = explode("*", $theme->shop_address);
        $home_banners = explode("*", $theme->home_banner);
        $prod_banners = explode("*", $theme->prod_banner);

        return view('admin.theme-setting', compact('theme','contact_phones',
                                                    'shop_addresses', 'home_banners', 'prod_banners'));
    }

    public function postThemeSetting(Request $request)
    {

        $theme = ThemeSetting::find(1);
        $theme->about_post = $request->about_post;
        $theme->hire_post = $request->hire_post;
        $theme->contact_email = $request->contact_email;
        $theme->contact_phone = implode( "*", $request->contact_phones);
        $theme->shop_address = implode( "*", $request->shop_addresses);

        //upload logo
        $logo_file = $request->file('logo');
        if ($request->hasFile('logo')) {
            $logo_name = $logo_file->getClientOriginalName();

            // unlink("uploads/theme/$theme->logo");
            $logo_file->move('uploads/theme', $logo_name);
            $theme->logo = $logo_name;
        }
        

        //upload home-banner
        $home_banner_names = array(0 => '', 
                                1 => '',
                                2 => '',
                                3 => '',
                                4 => '');

        $home_banners = $request->file('home_banners');

        if($request->hasFile('home_banners'))
        {
            foreach ($home_banners as $key => $image) 
            {
                $image_name = $image->getClientOriginalName();
                // unlink("uploads/theme/$home_banner_names[$key]");

                $image->move('uploads/theme', $image_name);
                $home_banner_names[$key] = $image_name;
            }

            //save home banner to db
            $theme->home_banner = implode( "*", $home_banner_names);
        }


        //upload prod-banner
        $prod_banner_names = array(0 => '', 
                                1 => '',
                                2 => '',
                                3 => '',
                                4 => '');

        $prod_banners = $request->file('prod_banners');

        if($request->hasFile('prod_banners'))
        {
            foreach ($prod_banners as $key => $image) 
            {
                $image_name = $image->getClientOriginalName();
                // unlink("uploads/theme/$home_banner_names[$key]");

                $image->move('uploads/theme', $image_name);
                $prod_banner_names[$key] = $image_name;
            }

            //save prod banner to db
            $theme->prod_banner = implode( "*", $prod_banner_names);
        }
        


        //upload about banner
        $about_banner_file = $request->file('about_banner');
        if ($request->hasFile('about_banner')) {
            $about_banner_name = $about_banner_file->getClientOriginalName();

            // unlink("uploads/theme/$theme->logo");
            $about_banner_file->move('uploads/theme', $about_banner_name);
            $theme->about_banner = $about_banner_name;
        }

        $theme->save();

        // echo json_encode($theme);
        // echo "<br>";
        // // echo json_encode($request);

        // return view('test');

        return redirect()->back()->with('alert-success', 'Đã lưu chỉnh sửa!');
    }
}
