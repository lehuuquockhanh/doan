<?php

use Illuminate\Database\Seeder;

class SachTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sach')->delete();
        
        \DB::table('sach')->insert(array (
            0 => 
            array (
                'created_at' => '2020-06-23 07:25:09',
                'ghim' => 1,
                'gia_ban' => '500000.00',
                'gia_khuyen_mai' => '300000.00',
                'gia_nhap' => '100000.00',
                'hinh_anh' => 'images/sach/159314318417208751.jpeg',
                'hinh_anh_1' => 'images/sach/159314318476855823.jpeg',
                'hinh_anh_2' => '1592897109.jpeg',
                'hinh_anh_3' => '1592897109.jpeg',
                'hinh_anh_4' => '1592897109.jpeg',
                'id' => 1,
                'mo_ta' => 'aaaaaaaaaaa',
                'mo_ta2' => 'bbbbbbbbbbbbbbbbbb',
                'ngay_xuat_ban' => '2020-06-23',
                'nha_xuat_ban' => 1,
                'so_luong' => 500,
                'tac_gia' => 1,
                'ten_sach' => 'Nhà Giả Kim',
                'the_loai' => 1,
                'updated_at' => '2020-06-26 06:55:41',
            ),
            1 => 
            array (
                'created_at' => '2020-06-23 07:36:54',
                'ghim' => 1,
                'gia_ban' => '8888888888.00',
                'gia_khuyen_mai' => '55555.00',
                'gia_nhap' => '6666666.00',
                'hinh_anh' => 'images/sach/159314319025977982.jpeg',
                'hinh_anh_1' => 'images/sach/159314319015198265.jpeg',
                'hinh_anh_2' => '1592897814.jpeg',
                'hinh_anh_3' => '1592897814.jpeg',
                'hinh_anh_4' => '1592897814.jpeg',
                'id' => 2,
                'mo_ta' => '333333333333',
                'mo_ta2' => '33333333333',
                'ngay_xuat_ban' => '2020-06-23',
                'nha_xuat_ban' => 2,
                'so_luong' => 444,
                'tac_gia' => 1,
                'ten_sach' => 'Ngàn Cánh Hạc',
                'the_loai' => 4,
                'updated_at' => '2020-06-26 06:55:45',
            ),
            2 => 
            array (
                'created_at' => '2020-06-23 07:42:40',
                'ghim' => NULL,
                'gia_ban' => '34534.00',
                'gia_khuyen_mai' => '21321.00',
                'gia_nhap' => '543.00',
                'hinh_anh' => 'images/sach/159314319875080499.jpeg',
                'hinh_anh_1' => 'images/sach/159314319865260723.jpeg',
                'hinh_anh_2' => '1592898160.jpeg',
                'hinh_anh_3' => '1592898160.jpeg',
                'hinh_anh_4' => '1592898160.jpeg',
                'id' => 3,
                'mo_ta' => '321312',
                'mo_ta2' => '312312',
                'ngay_xuat_ban' => '2020-06-23',
                'nha_xuat_ban' => 1,
                'so_luong' => 455,
                'tac_gia' => 1,
                'ten_sach' => 'Nhà Giả Kimdsa',
                'the_loai' => 4,
                'updated_at' => '2020-06-26 03:46:38',
            ),
            3 => 
            array (
                'created_at' => '2020-06-23 08:23:30',
                'ghim' => NULL,
                'gia_ban' => '566666666.00',
                'gia_khuyen_mai' => '77777.00',
                'gia_nhap' => '4444444.00',
                'hinh_anh' => 'images/sach/15931432063103967.jpeg',
                'hinh_anh_1' => 'images/sach/159314320656170417.jpeg',
                'hinh_anh_2' => NULL,
                'hinh_anh_3' => NULL,
                'hinh_anh_4' => NULL,
                'id' => 4,
                'mo_ta' => 'Đây là nhà xuất bản sách nổi tiếng cho thiếu nhi thuộc trực thuộc Trung ương Đoàn TNCS Hồ Chí Minh. Các nhà văn trẻ có thể gửi tác phẩm của mình cho nhà xuất bản Kim Đồng. Nhà xuất bản Kim Đồng chuyên in ấn, xuất bản sách dành cho thiếu nhi và các bậc phụ huynh trong cả nước. Ngoài ra nhà xuất bản còn có nhiều sách để quảng bá và giới thiệu văn hóa Việt Nam ra thế giới.',
                'mo_ta2' => NULL,
                'ngay_xuat_ban' => '2020-06-23',
                'nha_xuat_ban' => 3,
                'so_luong' => 66667,
                'tac_gia' => 3,
                'ten_sach' => 'Dạy con làm giàu tập 1',
                'the_loai' => 4,
                'updated_at' => '2020-06-26 03:46:46',
            ),
            4 => 
            array (
                'created_at' => '2020-06-23 08:24:19',
                'ghim' => NULL,
                'gia_ban' => '6666666.00',
                'gia_khuyen_mai' => '5555.00',
                'gia_nhap' => '11111.00',
                'hinh_anh' => 'images/sach/159314321476418541.jpeg',
                'hinh_anh_1' => 'images/sach/159314321467792144.jpeg',
                'hinh_anh_2' => NULL,
                'hinh_anh_3' => NULL,
                'hinh_anh_4' => NULL,
                'id' => 5,
                'mo_ta' => 'Đây là nhà xuất bản sách nổi tiếng cho thiếu nhi thuộc trực thuộc Trung ương Đoàn TNCS Hồ Chí Minh. Các nhà văn trẻ có thể gửi tác phẩm của mình cho nhà xuất bản Kim Đồng. Nhà xuất bản Kim Đồng chuyên in ấn, xuất bản sách dành cho thiếu nhi và các bậc phụ huynh trong cả nước. Ngoài ra nhà xuất bản còn có nhiều sách để quảng bá và giới thiệu văn hóa Việt Nam ra thế giới.',
                'mo_ta2' => 'fesfff',
                'ngay_xuat_ban' => '2020-06-23',
                'nha_xuat_ban' => 2,
                'so_luong' => 456,
                'tac_gia' => 1,
            'ten_sach' => 'Doanh Nghiệp Của Thế Kỷ 21 (Tái Bản 2019)',
                'the_loai' => 4,
                'updated_at' => '2020-06-26 03:46:54',
            ),
            5 => 
            array (
                'created_at' => '2020-06-23 08:25:01',
                'ghim' => NULL,
                'gia_ban' => '67777777.00',
                'gia_khuyen_mai' => '555666.00',
                'gia_nhap' => '11111.00',
                'hinh_anh' => 'images/sach/159314322463939858.jpeg',
                'hinh_anh_1' => 'images/sach/159314322416152942.jpeg',
                'hinh_anh_2' => NULL,
                'hinh_anh_3' => NULL,
                'hinh_anh_4' => NULL,
                'id' => 6,
                'mo_ta' => 'Đây là nhà xuất bản sách nổi tiếng cho thiếu nhi thuộc trực thuộc Trung ương Đoàn TNCS Hồ Chí Minh. Các nhà văn trẻ có thể gửi tác phẩm của mình cho nhà xuất bản Kim Đồng. Nhà xuất bản Kim Đồng chuyên in ấn, xuất bản sách dành cho thiếu nhi và các bậc phụ huynh trong cả nước. Ngoài ra nhà xuất bản còn có nhiều sách để quảng bá và giới thiệu văn hóa Việt Nam ra thế giới.',
                'mo_ta2' => '213123',
                'ngay_xuat_ban' => '2020-06-23',
                'nha_xuat_ban' => 3,
                'so_luong' => 455,
                'tac_gia' => 4,
                'ten_sach' => 'Giá Trong Chiến Lược Kinh Doanh',
                'the_loai' => 1,
                'updated_at' => '2020-06-26 03:47:04',
            ),
            6 => 
            array (
                'created_at' => '2020-06-23 08:25:29',
                'ghim' => 1,
                'gia_ban' => '6456546.00',
                'gia_khuyen_mai' => '654654654.00',
                'gia_nhap' => '564546.00',
                'hinh_anh' => 'images/sach/159314323127374986.jpeg',
                'hinh_anh_1' => 'images/sach/159314323133292594.jpeg',
                'hinh_anh_2' => NULL,
                'hinh_anh_3' => NULL,
                'hinh_anh_4' => NULL,
                'id' => 7,
                'mo_ta' => '654654654',
                'mo_ta2' => '654654645654',
                'ngay_xuat_ban' => '2020-06-23',
                'nha_xuat_ban' => 2,
                'so_luong' => 6656,
                'tac_gia' => 6,
                'ten_sach' => 'Nhà Đầu Tư Thông Minh',
                'the_loai' => 4,
                'updated_at' => '2020-06-26 06:55:49',
            ),
            7 => 
            array (
                'created_at' => '2020-06-23 08:25:55',
                'ghim' => NULL,
                'gia_ban' => '43243243.00',
                'gia_khuyen_mai' => '432432432.00',
                'gia_nhap' => '44444.00',
                'hinh_anh' => 'images/sach/159314339155869431.jpeg',
                'hinh_anh_1' => 'images/sach/159314339163818932.jpeg',
                'hinh_anh_2' => NULL,
                'hinh_anh_3' => NULL,
                'hinh_anh_4' => NULL,
                'id' => 8,
                'mo_ta' => '342432',
                'mo_ta2' => '4324324243',
                'ngay_xuat_ban' => '2020-06-23',
                'nha_xuat_ban' => 2,
                'so_luong' => 545,
                'tac_gia' => 3,
                'ten_sach' => 'Nghệ Thuật Bán Hàng Bậc Cao',
                'the_loai' => 1,
                'updated_at' => '2020-06-26 03:49:51',
            ),
            8 => 
            array (
                'created_at' => '2020-06-23 09:04:36',
                'ghim' => NULL,
                'gia_ban' => '544343.00',
                'gia_khuyen_mai' => '555555.00',
                'gia_nhap' => '3213123.00',
                'hinh_anh' => 'images/sach/15931433995763094.jpeg',
                'hinh_anh_1' => 'images/sach/159314339943634982.jpeg',
                'hinh_anh_2' => NULL,
                'hinh_anh_3' => NULL,
                'hinh_anh_4' => NULL,
                'id' => 9,
                'mo_ta' => '443243',
                'mo_ta2' => 'Đây là nhà xuất bản sách nổi tiếng cho thiếu nhi thuộc trực thuộc Trung ương Đoàn TNCS Hồ Chí Minh. Các nhà văn trẻ có thể gửi tác phẩm của mình cho nhà xuất bản Kim Đồng. Nhà xuất bản Kim Đồng chuyên in ấn, xuất bản sách dành cho thiếu nhi và các bậc phụ huynh trong cả nước. Ngoài ra nhà xuất bản còn có nhiều sách để quảng bá và giới thiệu văn hóa Việt Nam ra thế giới.',
                'ngay_xuat_ban' => '2020-06-23',
                'nha_xuat_ban' => 3,
                'so_luong' => 412444,
                'tac_gia' => 1,
                'ten_sach' => 'Ngàn Cánh Hạc',
                'the_loai' => 1,
                'updated_at' => '2020-06-26 03:49:59',
            ),
            9 => 
            array (
                'created_at' => '2020-06-23 10:49:40',
                'ghim' => 1,
                'gia_ban' => '77777777.00',
                'gia_khuyen_mai' => '8555.00',
                'gia_nhap' => '66666666.00',
                'hinh_anh' => 'images/sach/159314340693682415.jpeg',
                'hinh_anh_1' => 'images/sach/159314340671629192.jpeg',
                'hinh_anh_2' => NULL,
                'hinh_anh_3' => NULL,
                'hinh_anh_4' => NULL,
                'id' => 10,
                'mo_ta' => '213123',
                'mo_ta2' => '4434343',
                'ngay_xuat_ban' => '2020-06-23',
                'nha_xuat_ban' => 2,
                'so_luong' => 555,
                'tac_gia' => 3,
            'ten_sach' => 'Nếu Tôi Biết Được Khi Còn 20 (Tái Bản)',
                'the_loai' => 1,
                'updated_at' => '2020-06-26 06:56:00',
            ),
        ));
        
        
    }
}