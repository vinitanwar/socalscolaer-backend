<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\News;
use App\Models\Newstype;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function getallnews(Request $request)
    {
        $filter = $request->query('data');
        if ($filter == "All") {
            $news = News::all();


            return response()->json(["success" => true, "news" => $news]);
        }



        $news = News::where("news_type", $filter)->get();
        return response()->json(["success" => true, "news" => $news]);
    }
    public function getnews(string $slug)
    {
        $news = News::where("slug", $slug)->first();
        if (!$news) {
            return response()->json(["success" => false, "message" => "news not Found"]);
        }
        $news->views += 1;
        $news->save();
        return response()->json(["success" => true, "news" => $news]);
    }



    public function getallcategories()
    {
        $categories = Newstype::all();
        return response()->json(["success" => true, "categories" => $categories]);
    }


    public function getallauthor()
    {
        $author = Author::all();
        if (!$author) {
            return response()->json(["success" => false, "message" => "Author Not Found"]);
        }
        return response()->json(["success" => true, "author" => $author]);
    }


    public function getauthor(string $name)
    {
        $author = Author::where("slug", $name)->first();
        if (!$author) {
            return response()->json(["success" => false, "message" => "author not found"]);
        }

        return response()->json(["success" => true, "author" => $author]);
    }




    public function getThreenews()
    {
        $news = News::whereNotNull("numbering")->get();
        return response()->json(["success" => true, "news" => $news]);
    }

    public function gettopviews()
    {
        $news = News::orderBy('views', 'desc')->take(9)->get();
        return response()->json(["success" => true, "news" => $news]);
    }

    public function getlatest()
    {
        $news = News::orderBy('created_at', 'desc')->take(20)->get();

        return response()->json(["success" => true, "news" => $news]);
    }

    public function getnewspaginated(Request $request)
    {
        $filter = $request->query('data');

        if ($filter === "All") {
            $news = News::orderBy('created_at', 'desc')->paginate(3);
        } else {
            $news = News::where("news_type", $filter)
                ->orderBy('created_at', 'desc')
                ->paginate(3);
        }

        return response()->json(["success" => true, "news" => $news]);
    }
    public function getEditorArtical()
    {

        $news = News::where("editor", '!=', "0")
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
        return response()->json(["success" => true, "news" => $news]);
    }

    public function getInternational(){
        $news = News::where("region",1)->take(9)->get();
        return response()->json(["success" => true, "news" => $news]);
    }
}
