<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function getAllBlog(){
        $blog= Blog::all();
   
        if(!$blog){
            return response()->json(["success"=>false]);
        }


         return response()->json(["success"=>true,"blog"=>$blog]);




    }


    public function getblog(string $slug){
        $blog= Blog::where("slug",$slug)->first();
 if(!$blog){
            return response()->json(["success"=>false]);
        }


         return response()->json(["success"=>true,"blog"=>$blog]);


    }
    public function addComment(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422);
    }
 $comment = Comment::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
       'website' => $request->website ?? '',
    ]);
 return response()->json([
        'success' => true,
        'message' => 'Comment added successfully!',
        
    ], 201);

    }
}
