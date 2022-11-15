<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\posts;

class postsController extends Controller
{
    public function index($id){
       
        //$posts = \DB::table('posts')->where("id",$id)->first();
        $posts = posts::where("id",$id)->first();
        if(!$posts){
            abort (404);
        }

        //migrations
        $data =[
            "posts"=> $posts
        ];
        return view('posts.index',$data);
    }

}

