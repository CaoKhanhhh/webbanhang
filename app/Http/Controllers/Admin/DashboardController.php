<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use Mail;

class DashboardController extends Controller
{
    public function index(){
        $cateNum = Category::count();
        $proNum = Product::count();
    	return view('admin.dashboard.index', compact('cateNum', 'proNum'));
    }

    public function sendMail($rcEmail, $subject, $content){
        
        $data = array('content'=> $content);
        Mail::send('mail', $data, function($message) use ($rcEmail, $subject, $content) {
            $message->to($rcEmail, 'ThienTH')
                    ->to('hoangtuan51096@gmail.com', 'hoang dep trai')
                    ->subject($subject);
            $message->from('hoangtuan51096@gmail.com','Hoang Tuan');
        });
        return "HTML Email Sent. Check your inbox.";
    }
}