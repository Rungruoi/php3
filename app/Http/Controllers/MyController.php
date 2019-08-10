<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    public function Xinchao(){
    	echo"Hello word";
    }
    public function Khoahoc($ten){
    	echo"Khoa hoc:" .$ten;
    	//controller lấy route
    	return redirect()->route('rou');
    }
    public function GetUrl(Request $request){
    	return $request->path();
    }
    public function postForm(Request $request){
    	echo $request->Hoten;
    }
    public function setCookie()
    {
        $response=new Response();
        $response->withcookie('khoahoc','Laravel',1);
      
        return $response;
    }
    public function getCookie(Request $request)
    {
        
        return $request->Cookie('khoahoc');
    }

    public function postFile(Request $request){
    	if($request->hasFile('myFile')){
    	
    		$file= $request->file('myFile');
    		 //Lấy Tên files
            echo 'Tên Files: ' . $file->getClientOriginalName();
            echo '<br/>';

            //Lấy Đuôi File
            echo 'Đuôi file: ' . $file->getClientOriginalExtension();
            echo '<br/>';

            //Lấy đường dẫn tạm thời của file
            echo 'Đường dẫn tạm: ' . $file->getRealPath();
            echo '<br/>';

            //Lấy kích cỡ của file đơn vị tính theo bytes
            echo 'Kích cỡ file: ' . $file->getSize();
            echo '<br/>';

            //Lấy kiểu file
            echo 'Kiểu files: ' . $file->getMimeType();
    		//$file->move('img','myfile.jpg');
    		echo"da có file";
    	}else{
    		echo"Chua có file";
    	}

    }
    public function getJson(){
    	$array=['Laravel','php','HTML'];
    	$ar=['laravel '=>'html'];
    	return response()->json($array) ;
    	return response()->json($ar);

    }
    //lấy view từ foder khác thông qua dấu {.}
    public function myView(){
    	return view('testview.text');
    }
    //truyen sang view
    public function Time($t){
    	return view('testview.text',['time'=>$t]);
    }
};
