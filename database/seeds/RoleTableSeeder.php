<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'Quản trị viên', 
                'code' => 'adminitrator', 
                'description' => 'Quản trị viên'
            ],
            [
                'name' => 'Quản lý người dùng', 
                'code' => 'userManager', 
                'description' => 'Quản lý người dùng'
            ],
            [
                'name' => 'Quản lý sản phẩm', 
                'code' => 'prodManager', 
                'description' => 'Quản lý sản phẩm'
            ],
            [
                'name' => 'Quản lý set trang phục', 
                'code' => 'setManager', 
                'description' => 'Quản lý set trang phục'
            ],
            [
                'name' => 'Quản lý khuyến mại', 
                'code' => 'discManager', 
                'description' => 'Quản lý khuyến mại'
            ],
            [
                'name' => 'Quản lý bài đăng', 
                'code' => 'postManager', 
                'description' => 'Quản lý bài đăng'
            ],
            [
                'name' => 'Quản lý đơn hàng', 
                'code' => 'orderManager', 
                'description' => 'Quản lý đơn hàng'
            ],
            [
                'name' => 'Xác nhận đơn hàng', 
                'code' => 'confirmOrder', 
                'description' => 'Xác nhận đơn hàng'
            ],
            [
                'name' => 'Đóng gói đơn hàng', 
                'code' => 'packingOrder', 
                'description' => 'Đóng gói đơn hàng'
            ],
            [
                'name' => 'Vận chuyển đơn hàng', 
                'code' => 'shipingOrder', 
                'description' => 'Vận chuyển đơn hàng'
            ],
        ]);
    }
}
