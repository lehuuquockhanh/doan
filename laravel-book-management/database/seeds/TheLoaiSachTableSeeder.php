<?php

use Illuminate\Database\Seeder;

class TheLoaiSachTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('the_loai_sach')->delete();
        
        \DB::table('the_loai_sach')->insert(array (
            0 => 
            array (
                'created_at' => '2020-06-23 06:29:40',
                'hinh_anh' => 'images/category/159315479393796076.jpeg',
                'id' => 1,
                'mo_ta' => 'aaaaaaaaaaa',
                'ten_the_loai' => 'Văn Học',
                'updated_at' => '2020-06-26 06:59:53',
            ),
            1 => 
            array (
                'created_at' => '2020-06-23 08:17:56',
                'hinh_anh' => 'images/category/159315479786733021.jpeg',
                'id' => 3,
                'mo_ta' => 'bbbbbbb',
                'ten_the_loai' => 'Kinh Tế',
                'updated_at' => '2020-06-26 06:59:57',
            ),
            2 => 
            array (
                'created_at' => '2020-06-23 08:18:03',
                'hinh_anh' => 'images/category/159315480029304595.jpeg',
                'id' => 4,
                'mo_ta' => 'cccccccccc',
                'ten_the_loai' => 'Sách Thiếu Nhi',
                'updated_at' => '2020-06-26 07:00:00',
            ),
            3 => 
            array (
                'created_at' => '2020-06-23 08:18:19',
                'hinh_anh' => 'images/category/159315480493847579.jpeg',
                'id' => 5,
                'mo_ta' => 'DDDDDĐ',
                'ten_the_loai' => 'Tâm  Lý - Kĩ Năng Sống',
                'updated_at' => '2020-06-26 07:00:04',
            ),
            4 => 
            array (
                'created_at' => '2020-06-23 08:18:29',
                'hinh_anh' => 'images/category/159315480980360189.jpeg',
                'id' => 6,
                'mo_ta' => 'HHHHHHHHHHHH',
                'ten_the_loai' => 'Nuôi Dạy Con',
                'updated_at' => '2020-06-26 07:00:09',
            ),
        ));
        
        
    }
}