<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Customer::class, function (Faker $faker) {

    $dist = array("Đông Anh","Cầu Giấy","Hoàng Mai","Ba Đình","Thanh Xuân");
    $style = array('Bohemian','Preppy ','Surfer Chic','Fashionista','Classic','Suburbanite');
    $money = array('low','medium','high');
    $age = array('');

    $c_dist = $dist[array_rand($dist, 1)];

    return [
        'user_id' => null,
        'city' => 'Hà Nội',
        'district' => $c_dist,
        'address' => "$c_dist, Hà Nội",
        'phone' => $faker->e164PhoneNumber,
        'gender' => random_int(0, 1),
        'birthday' => $faker->date,
        'fashion_style' => $style[array_rand($style, 1)],
        'spend_money' => $money[array_rand($money, 1)]
    ];
});
