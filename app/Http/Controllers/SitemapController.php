<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\postcategory;
use App\Post;
use App\comment;
use App\User;
use App\time;
use App\response;
use App\schedule;
use App\SliderItem;
use App\post_tag;
use App\consultant;
use App\procedure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Session\Store;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;
// OR
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
         return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
    }

    public function articles()
    {
        $articles =  Post::where('show_at','<',carbon::now())->orWhere('show_at',NULL)->orderBy('created_at','DESC')->where('category','1')->get();
        return response()->view('sitemap.articles', [ 'articles' => $articles ])->header('Content-Type', 'text/xml');
    }

    public function movies()
    {
        $articles =  Post::where('show_at','<',carbon::now())->orWhere('show_at',NULL)->orderBy('created_at','DESC')->where('category','6')->get();
        return response()->view('sitemap.movies', [ 'articles' => $articles ])->header('Content-Type', 'text/xml');
    }

    public function categories()
    {
        $articles =  postcategory::orderBy('created_at','DESC')->get();
        return response()->view('sitemap.categories', [ 'articles' => $articles ])->header('Content-Type', 'text/xml');
    }

    public function resume()
    {
        $articles =  Post::where('show_at','<',carbon::now())->orWhere('show_at',NULL)->orderBy('created_at','DESC')->where('category','8')->get();
        return response()->view('sitemap.resume', [ 'articles' => $articles ])->header('Content-Type', 'text/xml');
    }


}



?>