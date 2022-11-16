<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                'name' => 'Bun',
                'email' => 'bun293@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 0,
                'description' => null,
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 0,
                'description' => null,
            ],
            [
                'name' => 'tranquang',
                'email' => 'tranquang@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-0.png',
                'level' => 1,
                'description' => 'tranquangisme'
            ],
            [
                'name' => 'khachhang',
                'email' => 'khachhang@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-0.png',
                'level' => 2,
                'description' => 'khachhang'
            ],
        ]);



        DB::table('blogs')->insert([
            [
                 'us_id' => 3,
                'title' => 'Nên chọn phin pha cà phê nhôm hay inox ?',
                'image' => 'latest-1.jpg',
                'content' => '',
            ],
            [
                 'us_id' => 3,
                'title' => 'Workshop “COLD BREW – xu hướng cafe lạnh”',
                'image' => 'latest-2.jpg',
                'content' => '',
            ],
            [
                 'us_id' => 3,
                'title' => 'NGẪM NỀN VĂN HÓA CÀ PHÊ Ở VIỆT NAM',
                'image' => 'latest-3.jpg',
                'content' => '',
            ],
            [
                 'us_id' => 3,
                'title' => 'CÙNG KHÁM PHÁ DÒNG CÀ PHÊ HẠT RANG XAY',
                'image' => 'blog-1.jpg',
                'content' => '',
            ],
            [
                 'us_id' => 3,
                'title' => 'TÁC DỤNG CỦA CÀ PHÊ TRONG ĐỜI SỐNG HÀNG NGÀY',
                'image' => 'blog-2.jpg',
                'content' => '',
            ],
            [
                 'us_id' => 3,
                'title' => 'CÓ GÌ BÊN TRONG MỘT QUẦY PHA CHẾ CÀ PHÊ?',
                'image' => 'blog-3.jpg',
                'content' => '',
            ],
        ]);

        DB::table('coffee_brands')->insert([
            [
                'name' => 'Trung Nguyên',
            ],
            [
                'name' => 'NESCAFE',
            ],
            [
                'name' => 'Cafe G8',
            ],
            [
                'name' => 'Vinacafe',
            ],
        ]);

        DB::table('coffee_category')->insert([
            [
                'name' => 'Cao cấp',
            ],
            [
                'name' => 'Rang xay/ Hạt',
            ],
            [
                'name' => 'Hòa tan',
            ],
        ]);

        DB::table('coffee_products')->insert([
            [
                'id' => 1,
                'id_coffee_brand' => 1,
                'id_coffee_category' => 2,
                'name' => 'Cà phê House Blend',
                'description' => 'Thành phần: Cà phê House Blend gồm 4 loại hạt cà phê Arabica, Robusta, Cherry và Catimor. Đặc tính: Nước pha màu nâu sánh. Mùi thơm đặc trưng. Hàm lượng Caffeine: khoảng 1.0%. Khối lượng: Hộp 500gr.',

                'price' => 70.000,
                'discount' => 80.000,
                'weight' => 1.3,
                // 'featured' => true,
            ],
            [
                'id' => 2,
                'id_coffee_brand' => 1,
                'id_coffee_category' => 2,
                'name' => 'Cafe hạt Culi Robusta Trung Nguyên',
                'description' => null,

                'price' => 160.000,
                'discount' => 175.000,
                'weight' => null,
                // 'featured' => true,
            ],
            [
                'id' => 3,
                'id_coffee_brand' => 3,
                'id_coffee_category' => 2,
                'name' => 'Cà Phê Hạt Mộc Success 8 ',
                'description' => null,

                'price' => 310.000,
                'discount' => 335.000,
                'weight' => null,
                // 'featured' => true,
            ],
            [
                'id' => 4,
                'id_coffee_brand' => 1,
                'id_coffee_category' => 1,
                'name' => 'Cafe Hạt Trung Nguyên Success 2',
                'description' => null,

                'price' => 310.000,
                'discount' => 335.000,
                'weight' => null,
                // 'featured' => true,
            ],
            [
                'id' => 5,
                'id_coffee_brand' => 1,
                'id_coffee_category' => 3,
                'name' => "Cà phê Chế phin 3",
                'description' => null,

                'price' => 117.000,
                'discount' => 135.000,
                'weight' => null,
                // 'featured' => false,
            ],
            [
                'id' => 6,
                'id_coffee_brand' => 2,
                'id_coffee_category' => 2,
                'name' => 'Cà phê Sáng tạo 3',
                'description' => null,

                'price' => 97.000,
                'discount' => 115.000,
                'weight' => null,
                // 'featured' => true,
            ],

        ]);

        DB::table('coffee_images')->insert([
            [
                'id_product' => 1,
                'path' => 'rangxay-2.jpg',
            ],
            [
                'id_product' => 2,
                'path' => 'hat-2.jpg',
            ],
            [
                'id_product' => 3,
                'path' => 'hat-3.jpg',
            ],
            [
                'id_product' => 4,
                'path' => 'hat-1.jpg',
            ],
            [
                'id_product' => 5,
                'path' => 'rangxay-1.jpg',
            ],
            [
                'id_product' => 6,
                'path' => 'rangxay-3.png',
            ],
        ]);

        DB::table('coffee_details')->insert([
            [
                'id_product' => 1,
                'type' => 'Rang xay/ Hạt',
            ],
            [
                'id_product' => 2,
                'type' => 'Cao cấp',
            ],
            [
                'id_product' => 3,
                'type' => 'Cao cấp',
            ],
            [
                'id_product' => 4,
                'type' => 'Rang xay/ Hạt',
            ],
            [
                'id_product' => 5,
                'type' => 'Rang xay/ Hạt',
            ],
            [
                'id_product' => 6,
                'type' => 'Hòa tan',
            ],
        ]);
    }
}
