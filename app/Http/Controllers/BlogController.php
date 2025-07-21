<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Internship;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function getAllBlog()
    {
        $blog = Blog::all();

        if (!$blog) {
            return response()->json(["success" => false]);
        }


        return response()->json(["success" => true, "blog" => $blog]);
    }


    public function getblog(string $slug)

    {
        $blog = Blog::where("slug", $slug)->first();
        if (!$blog) {
            return response()->json(["success" => false]);
        }


        return response()->json(["success" => true, "blog" => $blog]);
    }
    public function addComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
             "slug"=>'required|string'
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
            'slug' => $request->slug,
            'website' => $request->website ?? '',
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Comment added successfully!',

        ], 201);
    }

    public function getComments(String $slug){
     
     $comment= Comment::where("slug",$slug)->get();
      if (!$comment) {
            return response()->json(["success" => false]);
        }


        return response()->json(["success" => true, "blog" => $comment]);


    }

    public function addInternship(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string',
            'message' => 'required|string',
           
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        Internship::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        
            'subject' => $request->subject ?? '',
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Comment added successfully!',

        ], 201);
    }

   public function addSubscribe(Request $request){
    // Validate the request
    $validator = Validator::make($request->all(), [
        'email' => 'required|email|max:255'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors()
        ], 422);
    }

    try {
        // Check if email already exists
        $existingSubscription = Subscribe::where('email', $request->email)->first();
        
        if ($existingSubscription) {
            return response()->json([
                'success' => false,
                'message' => 'This email is already subscribed'
            ], 409); // 409 Conflict status code
        }

        // Create new subscription
        $subscribe = Subscribe::create([
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for subscribing!',
            'data' => $subscribe
        ], 201); // 201 Created status code

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Subscription failed',
            'error' => $e->getMessage()
        ], 500);
    }
}
}
