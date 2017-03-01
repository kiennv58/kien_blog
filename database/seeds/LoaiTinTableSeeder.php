<?php

use Illuminate\Database\Seeder;

class LoaiTinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('news_type')->insert([
        	['category_id'=>'1','name' => 'Giáo Dục','cut_name' => 'Giao-Duc'],
        	['category_id'=>'1','name' => 'Nhịp Điệu Trẻ','cut_name' => 'Nhip-Dieu-Tre'],
        	['category_id'=>'1','name' => 'Du Lịch','cut_name' => 'Du-Lich'],
        	['category_id'=>'1','name' => 'Du Học','cut_name' => 'Du-Hoc'],
        	['category_id'=>'2','name' => 'Cuộc Sống Đó Đây','cut_name' => 'Cuoc-Song-Do-Day'],
        	['category_id'=>'2','name' => 'Ảnh','cut_name' => 'Anh'],
        	['category_id'=>'2','name' => 'Người Việt 5 Châu','cut_name' => 'Nguoi-Viet-5-Chau'],
        	['category_id'=>'2','name' => 'Phân Tích','cut_name' => 'Phan-Tich'],
        	['category_id'=>'3','name' => 'Chứng Khoán','cut_name' => 'Chung-Khoan'],
        	['category_id'=>'3','name' => 'Bất Động Sản','cut_name' => 'Bat-Dong-San'],
        	['category_id'=>'3','name' => 'Doanh Nhân','cut_name' => 'Doanh-Nhan'],
        	['category_id'=>'3','name' => 'Quốc Tế','cut_name' => 'Quoc-Te'],
        	['category_id'=>'3','name' => 'Mua Sắm','cut_name' => 'Mua-Sam'],
        	['category_id'=>'3','name' => 'Doanh Nghiệp Viết','cut_name' => 'Doanh-Nghiep-Viet'],
        	['category_id'=>'4','name' => 'Hoa Hậu','cut_name' => 'Hoa-Hau'],
        	['category_id'=>'4','name' => 'Nghệ Sỹ','cut_name' => 'Nghe-Sy'],
        	['category_id'=>'4','name' => 'Âm Nhạc','cut_name' => 'Am-Nhac'],
        	['category_id'=>'4','name' => 'Thời Trang','cut_name' => 'Thoi-Trang'],
        	['category_id'=>'4','name' => 'Điện Ảnh','cut_name' => 'Dien-Anh'],
        	['category_id'=>'4','name' => 'Mỹ Thuật','cut_name' => 'My-Thuat'],
        	['category_id'=>'5','name' => 'Bóng Đá','cut_name' => 'Bong-Da'],
        	['category_id'=>'5','name' => 'namenis','cut_name' => 'namenis'],
        	['category_id'=>'5','name' => 'Chân Dung','cut_name' => 'Chan-Dung'],
        	['category_id'=>'5','name' => 'Ảnh','cut_name' => 'Anh-TT'],
        	['category_id'=>'6','name' => 'Hình Sự','cut_name' => 'Hinh-Su']
    	]);
    }
}


