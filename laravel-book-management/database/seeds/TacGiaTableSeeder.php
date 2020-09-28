<?php

use Illuminate\Database\Seeder;

class TacGiaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tac_gia')->delete();
        
        \DB::table('tac_gia')->insert(array (
            0 => 
            array (
                'created_at' => '2020-06-23 06:18:45',
                'dia_chi' => 'Nội Duệ - Tiên Du - Bắc Ninh',
                'hinh_anh' => 'sdaddsa',
                'id' => 1,
                'mo_ta1' => 'ggggggggggggggggggggggggg',
                'mo_ta2' => 'DDDDDDDDDDDDDD',
                'mo_ta3' => 'cccc',
                'ngay_sinh' => '2020-12-20',
                'ten_tac_gia' => 'Nam Cao',
                'updated_at' => '2020-06-23 06:19:41',
            ),
            1 => 
            array (
                'created_at' => '2020-06-23 08:07:01',
                'dia_chi' => 'Từ Sơn - Bắc Ninh',
                'hinh_anh' => 'sdaddsa',
                'id' => 3,
                'mo_ta1' => '444444',
                'mo_ta2' => '1dasada',
                'mo_ta3' => 'dsadasdsa',
                'ngay_sinh' => '2020-12-20',
                'ten_tac_gia' => 'Ngô Tất Tố',
                'updated_at' => '2020-06-23 08:07:01',
            ),
            2 => 
            array (
                'created_at' => '2020-06-23 08:07:19',
                'dia_chi' => 'Hà Nội',
                'hinh_anh' => 'aaaaaaa',
                'id' => 4,
                'mo_ta1' => 'BBBBBBB',
                'mo_ta2' => 'CCCCCCCCCC',
                'mo_ta3' => 'DDDDd',
                'ngay_sinh' => '2020-12-20',
                'ten_tac_gia' => 'Trang Hạ',
                'updated_at' => '2020-06-23 08:07:19',
            ),
            3 => 
            array (
                'created_at' => '2020-06-23 08:07:33',
                'dia_chi' => 'Nội Duệ - Tiên Du - Bắc Ninh',
                'hinh_anh' => 'aaaaa',
                'id' => 5,
                'mo_ta1' => '2313333333333',
                'mo_ta2' => '33444444444444',
                'mo_ta3' => '5555555555555555',
                'ngay_sinh' => '2020-12-20',
                'ten_tac_gia' => 'Nguyễn Phong Việt',
                'updated_at' => '2020-06-23 08:07:33',
            ),
            4 => 
            array (
                'created_at' => '2020-06-23 08:07:51',
                'dia_chi' => '55 Quang Trung, Hai Bà Trưng, Hà Nội',
                'hinh_anh' => 'sdaddsa',
                'id' => 6,
                'mo_ta1' => '22222222222',
                'mo_ta2' => '333333333',
                'mo_ta3' => '4444444444444',
                'ngay_sinh' => '2020-12-20',
                'ten_tac_gia' => 'Anh khang',
                'updated_at' => '2020-06-23 08:07:51',
            ),
        ));
        
        
    }
}