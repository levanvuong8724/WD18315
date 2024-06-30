<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Lab1
    public function showProduct()
    {
        $thongtin = [
            [
                'id' => '1',
                'name' => 'Lê Văn Vương',
                'msv' => 'PS30756',
                'email' => 'vuong@gmail.com'
            ],
            [
                'id' => '2',
                'name' => 'Lê Văn Hùng',
                'msv' => 'PS30736',
                'email' => 'hung@gmail.com'
            ]
        ];

        return view('thongtinsv')->with([
            'ThongTin' => $thongtin
        ]);
    }


    public function queryBuilder()
    {
        // 1. Lấy danh sách user
        // $result = DB::table('users')->get();

        // 2. Lấy thông tin id = 4
        // $result = DB::table('users')->where('id','=','4')->first();
        // Dùng cho id
        // $result = DB::table('users')->find('4');

        //.3 lấy thuộc tính 'name' của user
        // $result = DB::table('users')->where('id','=','16')->value('name');

        //.4 Lấy danh sách iduser của 'Phòng ban giám hiệu'
        // $idPhongBan = DB::table('phongban')->where('ten_donvi','like','Ban giám hiệu')->value('id');
        // $result = DB::table('users')->where('phongban_id',$idPhongBan)->pluck('id');// get toàn bộ

        //.5 Tìm tuổi user có độ tuổi lớn nhất công ty
        // truy vấn lồng 
        // $result = DB::table('users')->where('tuoi',DB::table('users')->max('tuoi'))->get();
        // $result = DB::table('users')->max('tuoi');

        //.6 Tìm user có độ tuổi nhỏ nhất công ty
        // $result = DB::table('users')->where('tuoi',DB::table('users')->min('tuoi'))->get();

        // //.7 Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user
        // $result = DB::table('users')
        // ->where('phongban_id',DB::table('phongban')
        // ->where('ten_donvi','like','Ban Giám Hiệu')
        // ->value('id'))->count();        

        //.8 Lấy danh sách tuổi các user
        // $result = DB::table('users')->select('tuoi')->get();

        //.9 Tìm danh sách user 'Khải' hoặc có tên 'Thanh'
        // $result = DB::table('users')->where('name','like','%Khải')->orWhere('name','like','%Thanh')->get();

        //.10 Lấy danh sách user ở phòng ban "Ban đào tạo"
        // $result = DB::table('users')->where('phongban_id',DB::table('phongban')->where('ten_donvi','like','Ban Đào Tạo')->value('id'))->pluck('id');
        // Cách 2
        // $idPhongBan = DB::table('user')->where('ten_donvi','like','Ban Đào Tạo')->value('id');
        // $result = DB::table('users')->where('phongban_id',$idPhongBan)->select('id','name','email')->get();

        //. 11 Lấy danh sách user có tuổi lớn hơn hoặc bằng 30 danh sách tăng dần
        // $result = DB::table('users')->where('tuoi','>=','30')->orderBy('tuoi','asc')->get();

        //.12 Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // $result = DB::table('users')->orderBy('tuoi','desc')
        // ->offset(5)->limit(10)
        // ->get();
        // dd($result);

        //.13 Thêm một user mới vào công ty
        // $data =[
        //     'name' => 'Nguyễn Văn A',
        //     'email' => 'abc@gmail.com',
        //     'phongban_id' => '1',
        //     'songaynghi' => '0',
        //     'tuoi' => '18',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ];

        // // DB::table('users')->insert($data);
        // // Hiện thị user mới thêm ra màn hình
        // $idNewUser = DB::table('users')->insertGetId($data);
        // $result = DB::table('users')->find($idNewUser);
        // dd($result);

        // .15 Xóa user nghỉ 15 ngày


        $result = DB::table('users')->where('songaynghi', '>', '15')->delete();

        dd($result);
    }
}
