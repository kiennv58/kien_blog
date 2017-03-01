<?php

use Illuminate\Database\Seeder;

class TheLoaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('categories')->insert([
        	['name' => 'Xã Hội','cut_name' => 'Xa-Hoi'],
        	['name' => 'Thế Giới','cut_name' => 'The-Gioi'],
        	['name' => 'Kinh Doanh','cut_name' => 'Kinh-Doanh'],
        	['name' => 'Văn Hoá','cut_name' => 'Van-Hoa'],
        	['name' => 'Thể Thao','cut_name' => 'The-Thao'],
        	['name' => 'Pháp Luật','cut_name' => 'Phap-Luat'],
        	['name' => 'Đời Sống','cut_name' => 'Doi-Song'],
        	['name' => 'Khoa Học','cut_name' => 'Khoa-Hoc'],
        	['name' => 'Vi Tính','cut_name' => 'Vi-Tinh'],
    	]);

    }
}
