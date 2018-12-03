<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Áo phông', 'type' => '0'],
            ['name' => 'Áo sơ mi', 'type' => '0'],
            ['name' => 'Áo kiểu', 'type' => '0'],
            ['name' => 'Áo nỉ', 'type' => '0'],
            ['name' => 'Áo len', 'type' => '0'],
            ['name' => 'Áo khoác', 'type' => '0'],
            ['name' => 'Quần jeans', 'type' => '1'],
            ['name' => 'Quần vải', 'type' => '1'],
            ['name' => 'Quần khaki', 'type' => '1'],
            ['name' => 'Quần shorts', 'type' => '1'],
            ['name' => 'Váy maxi', 'type' => '2'],
            ['name' => 'Váy suông', 'type' => '2'],
            ['name' => 'Váy body', 'type' => '2'],
            ['name' => 'Váy xòe', 'type' => '2'],
            ['name' => 'Chân váy', 'type' => '2'],
            ['name' => 'Bộ mặc nhà', 'type' => '3'],
            ['name' => 'Bộ thể thao', 'type' => '3'],
            ['name' => 'Jumsuit', 'type' => '3'],
            ['name' => 'Giày búp bê', 'type' => '4'],
            ['name' => 'Giày cao gót', 'type' => '4'],
            ['name' => 'Boots', 'type' => '4'],
            ['name' => 'Sneaker', 'type' => '4'],
            ['name' => 'Sandals', 'type' => '4'],
            ['name' => 'Balo', 'type' => '4'],
            ['name' => 'Túi xách', 'type' => '4'],
            ['name' => 'Ví', 'type' => '4'],
        ]);
    }
}
