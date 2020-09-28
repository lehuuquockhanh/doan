<?php

use Illuminate\Database\Seeder;

class NhaXuatBanTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nha_xuat_ban')->delete();
        
        \DB::table('nha_xuat_ban')->insert(array (
            0 => 
            array (
                'created_at' => '2020-06-23 04:24:01',
                'dia_chi' => '55 Quang Trung, Hai Bà Trưng, Hà Nội',
                'hinh_anh' => 'aaaaaaaaaaa',
                'id' => 1,
                'mo_ta' => 'Đây là nhà xuất bản sách nổi tiếng cho thiếu nhi thuộc trực thuộc Trung ương Đoàn TNCS Hồ Chí Minh. Các nhà văn trẻ có thể gửi tác phẩm của mình cho nhà xuất bản Kim Đồng. Nhà xuất bản Kim Đồng chuyên in ấn, xuất bản sách dành cho thiếu nhi và các bậc phụ huynh trong cả nước. Ngoài ra nhà xuất bản còn có nhiều sách để quảng bá và giới thiệu văn hóa Việt Nam ra thế giới.',
                'mo_ta2' => 'gfdgfd',
                'ten_nha_xuat_ban' => 'Nhà Xuất Bản Kim Đồng',
                'updated_at' => '2020-06-23 04:33:51',
            ),
            1 => 
            array (
                'created_at' => '2020-06-23 04:29:11',
                'dia_chi' => '161B Lý Chính Thắng, Phường 7, Quận 3, Thành phố Hồ Chí Minh.',
                'hinh_anh' => 'AAAAA',
                'id' => 2,
                'mo_ta' => 'Nhà xuất bản trẻ xuất bản sách và văn hóa phẩm các loại, phục vụ chủ yếu là các đối tượng trẻ như thanh niên, thiếu nhi, tổ chức Đoàn các cấp của thành phố, phục vụ bạn đọc trong và ngoài nước. Nhà xuất bản có nhận xuất bản nhiều thể loại sách như: tài liệu chính trị, kiến thức phổ thông, văn hóa – xã hội, nghệ thuật, văn học, từ điển,...',
                'mo_ta2' => 'BBBBBBBB',
                'ten_nha_xuat_ban' => 'Nhà Xuất Bản Trẻ',
                'updated_at' => '2020-06-23 04:29:18',
            ),
            2 => 
            array (
                'created_at' => '2020-06-23 08:08:45',
                'dia_chi' => 'Số 6/86 Duy Tân, Cầu Giấy, Hà Nội;',
                'hinh_anh' => 'cccccccccccccc',
                'id' => 3,
                'mo_ta' => 'Nhà xuất bản Chính trị quốc gia sự thật là đơn vị sự nghiệp trung ương của Đảng, xuất bản những cuốn sách về chính trị của Đảng và Nhà nước. Tổ chức biên tập, xuất bản các sách chính trị, xã hội, lý luận và pháp luật. Nhà xuất bản xuất bản sách chính trị nhằm nâng cao các kiến thức của nhân dân về chính trị, xã hội, lý luận và pháp luật. Phục vụ sự nghiệp đổi mới và hai nhiệm vụ chiến lược xây dựng và bảo vệ Tổ quốc.',
                'mo_ta2' => 'sssssss',
                'ten_nha_xuat_ban' => 'Nhà xuất bản chính trị quốc gia sự thật',
                'updated_at' => '2020-06-23 08:08:45',
            ),
            3 => 
            array (
                'created_at' => '2020-06-23 08:09:04',
                'dia_chi' => '81 Trần Hưng Đạo, Hà Nội',
                'hinh_anh' => 'vvvvvvvvvvvvv',
                'id' => 4,
                'mo_ta' => 'Nhà xuất bản Giáo dục được thành lập ngày 1 tháng 6 năm 1957. Nhà xuất bản là một doanh nghiệp Nhà nước trực thuộc Bộ Giáo dục và Đào tạo. Nhà xuất bản Giáo dục có nhiệm vụ như sau:  Tổ chức biên soạn, biên tập, in ấn và phát hành các loại sách giáo khoa cho học sinh, sinh viên. Phát hành các sản phẩm giáo dục phục vụ nghiên cứu, giảng dạy, học tập. Giúp Bộ Giáo dục và Đào tạo trong công tác thiết bị giáo dục, thư viện trường học.',
                'mo_ta2' => 'ggggggggggggg',
                'ten_nha_xuat_ban' => 'Nhà xuất bản giáo dục',
                'updated_at' => '2020-06-23 08:09:04',
            ),
            4 => 
            array (
                'created_at' => '2020-06-23 08:09:20',
                'dia_chi' => 'Số 65 Nguyễn Du, Hà Nội',
                'hinh_anh' => 'HHHHHHHHHHHHHh',
                'id' => 5,
                'mo_ta' => 'Nhà xuất bản Hội Nhà văn được thành lập năm 1957. Nhà xuất bản Hội Nhà văn là sự kế thừa và tiếp thu có hiệu quả của công tác xuất bản của Nhà xuất bản Văn nghệ. Sản phẩm chủ yếu của nhà xuất bản là xuất bản sách đa dạng các thể loại như: tiểu thuyết, văn học, truyện ngắn, nghiên cứu, thơ,… và báo chí.',
                'mo_ta2' => 'GGGGGGGGGg',
                'ten_nha_xuat_ban' => 'Nhà xuất bản Hội Nhà văn',
                'updated_at' => '2020-06-23 08:09:20',
            ),
        ));
        
        
    }
}