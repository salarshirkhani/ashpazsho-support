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

class FrontController extends Controller
{

    public function index() {

        SEOTools::setTitle('اوستا');
        SEOTools::setDescription('گروه بلع‌درمانی  اوستا  در سال 1396 و با همت یک مجموعه جوان متخصص برای نخستین بار در سیستم درمانی کشور ایجاد شده است. ');
        SEOTools::opengraph()->setUrl('https://avestot.com/');
        SEOTools::setCanonical('https://avestot.com/');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');

        return view('welcome',[
            'products' => Product::orderBy('id','desc')->paginate(6),
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
            'slider' => SliderItem::orderBy('priority', 'desc')->get(),
            'posts' => Post::where('show_at','<',carbon::now())->orWhere('show_at',NULL)->orderBy('created_at','DESC')->get()
        ]);

    }

    public function products() {

        return view('shop',[
            'products' => Product::orderBy('id','desc')->paginate(16),
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
        ]);

    }

    public function Sproduct($name) {
        $item=Product::where('slug',$name)->first();
        $category=Category::find($item->category);
        return view('product',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
            'item' => $item,
            'category' => $category,
        ]);

    }

    public function blog() {

        SEOTools::setTitle('اوستا - مقالات');
        SEOTools::setDescription('گروه بلع‌درمانی اوستا  در سال 1396 و با همت یک مجموعه جوان متخصص برای نخستین بار در سیستم درمانی کشور ایجاد شده است. ');
        SEOTools::opengraph()->setUrl('http://avestot.com/blog');
        SEOTools::setCanonical('https://avestot.com');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');

        return view('blog',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
            'posts' => Post::where('show_at','<',carbon::now())->orWhere('show_at',NULL)->orderBy('created_at','desc')->paginate(10)
        ]);

    }

    public function single($id) {
        $item=Post::where('slug',$id)->first();
        $related_posts = Post::where('slug','!=',$id)->inRandomOrder()->LIMIT('4')->get();
        
        SEOTools::setTitle('اوستا- '.$item->gtitle);
        SEOTools::setDescription($item->gexplain);
        SEOTools::opengraph()->setUrl('http://avestot.com');
        JsonLd::addImage( asset('images/'.$item['pic'].'/'.$item['pic'] ) );
        SEOTools::setCanonical('http://avestot.com/'.$item->slug);
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');
        OpenGraph::addImage(['url' => asset('images/'.$item['pic'].'/'.$item['pic'] ) , 'size' => 300]);
        OpenGraph::setTitle(' اوستا - '.$item->gtitle)
        ->setDescription($item->gexplain)
        ->setType('article')
        ->setArticle([
            'published_time' => $item->created_at,
            'modified_time' => $item->updated_at,
            'expiration_time' => 'datetime',
            'author' => 'iranmedslp',
        ]);
        OpenGraph::setUrl('http://avestot.com/'.$item->slug);

        $comments = comment::where('post_id',$item->id)->where('status','accept')->orderBy('created_at', 'desc')->get();
        $tags=post_tag::select('name')->where('post_id',$item->id)->orderBy('created_at', 'desc')->get();
        SEOMeta::addKeyword([$tags]);

        return view('single',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
            'item' => $item,
            'comments' => $comments ,
            'tags' => $tags ,
            'related_posts' => $related_posts,         
        ]);

    }

    public function contact() {

        return view('contact');

    }
    
    public function about() {

        SEOTools::setTitle('اوستا - درباره ما');
        SEOTools::setDescription('گروه بلع‌درمانی  اوستا در سال 1396 و با همت یک مجموعه جوان متخصص برای نخستین بار در سیستم درمانی کشور ایجاد شده است. ');
        SEOTools::opengraph()->setUrl('http://avestot.com/about');
        SEOTools::setCanonical('https://avestot.com/about');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');

        return view('about');

    }
    
    public function employees() {

        SEOTools::setTitle(' اوستا - همکاران ما');
        SEOTools::setDescription('درباره تیم ایران مد اس ال پی از بیمارستان نیکان بیشتر بدانید .معرفی تیم اعضای ایران مد اس ال پی به صورت ویدیو');
        SEOTools::opengraph()->setUrl('http://avestot.com/employees');
        SEOTools::setCanonical('https://avestot.com/employees');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');

        return view('employees');

    }
    
    public function profile($id) {
        $item=User::where('id',$id)->first();

        SEOTools::setTitle(' اوستا  -'.$item->first_name.$item->last_name);
        SEOTools::setDescription($item->about);
        SEOTools::opengraph()->setUrl('http://avestot.com/profile/'.$id);
        SEOTools::setCanonical('https://avestot.com/team');
        SEOTools::twitter()->setSite('@avestot');
        OpenGraph::setTitle('ایران مد اس ال پی -'.$item->first_name.$item->last_name)
             ->setDescription($item->about)
            ->setType('profile')
            ->setProfile([
                'first_name' => $item->first_name,
                'last_name' => $item->last_name,
            ]);

        return view('profile',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
            'posts' => Post::orderBy('id','desc')->get(),
            'item' => $item,
        ]);
    }
    
    public function team() {

        SEOTools::setTitle(' اوستا - همکاران ما');
        SEOTools::setDescription('درباره تیم  اوستا  از بیمارستان نیکان بیشتر بدانید . تیمی قوی با پشتوانه علمی مدرن');
        SEOTools::opengraph()->setUrl('http://avestot.com/team');
        SEOTools::setCanonical('https://avestot.com/team');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');

        return view('persons',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
            'posts' => User::where('type','operator')->orderBy('created_at', 'desc')->get(),
        ]);
    }

    //APPOINTMENT CONTROLLER

    public function appointment() {

        SEOTools::setTitle(' اوستا - نوبت دهی');
        SEOTools::setDescription('درباره تیم اوستا  بیمارستان نیکان بیشتر بدانید . تیمی قوی با پشتوانه علمی مدرن');
        SEOTools::opengraph()->setUrl('http://avestot.com/appointment');
        SEOTools::setCanonical('https://avestot.com/appointment');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');

        return view('dating',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
            'posts' => User::where('type','operator')->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function doctor($id) {
        $item=User::where('id',$id)->first();
        $time=time::where('user_id',$id)->get();

        SEOTools::setTitle(' اوستا  -'.$item->first_name.$item->last_name);
        SEOTools::setDescription($item->about);
        SEOTools::opengraph()->setUrl('https://avestot.com');
        SEOTools::setCanonical('https://avestot.com');
        SEOTools::twitter()->setSite('@avestot');
        OpenGraph::setTitle(' اوستا -'.$item->first_name.$item->last_name)
             ->setDescription($item->about)
            ->setType('profile')
            ->setProfile([
                'first_name' => $item->first_name,
                'last_name' => $item->last_name,
            ]);
        return view('doctor',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
            'posts' => Post::orderBy('id','desc')->get(),
            'item' => $item,
            'time' => $time,
        ]);
    }
    //SEARCH FORM 

    private function escape_like(string $value, string $char = '\\'): string
    {
        return str_replace(
            [$char, '%', '_'],
            [$char.$char, $char.'%', $char.'_'],
            $value
        );
    }

    public function search(request $request)
    {
        $data = $request->validate([
            'q' => 'sometimes|string',
        ]);
        $posts = Post::where('title', 'LIKE', '%'. $this->escape_like($data['q']) . '%')->orderBy('created_at','desc')->paginate(10);
        return view('blog',['posts' => $posts, 
        'categories' => Category::whereNull('parent_id')->with('allChildren')->get()]);
    }

    public function comment(Request $request) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'] ,
            'user_id' => ['nullable','exists:users,id'],
        ]);
        $post = new comment([
            'user_id' => $request->input('user_id'),
            'post_id' => $request->input('post_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'status' => 'new',
            'description' => $request->input('content'),
        ]);
        $post->save();
        return redirect()->back()->with('info', ' نظر شما ثبت شد و پس از تایید نمایش داده خواهد شد');
    }

    public function schedu(Request $request) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'] ,
            'user_id' => ['nullable','exists:users,id'],
            'doctor_id' => ['nullable','exists:users,id'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile' => ['required', 'regex:/^(09[0-9]{9})|(۰۹[۰-۹]{9})$/'],

        ]);
        $post = new schedule([
            'user_id' => $request->input('user_id'),
            'doctor_id' => $request->input('doctor_id'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'content' => $request->input('date'),
        ]);
        $post->save();
        return redirect()->back()->with('info', ' نوبت شما ثبت شد و با شما تماس گرفته خواهد شد');
    }

        //CONSULTANT CONTROLLER

        public function Consultant() {

            SEOTools::setTitle('ایران مد اس ال پی - مشاوره');
            SEOTools::setDescription('درباره تیم ایران مد اس ال پی از بیمارستان نیکان بیشتر بدانید . تیمی قوی با پشتوانه علمی مدرن');
            SEOTools::opengraph()->setUrl('http://avestot.com/consultant');
            SEOTools::setCanonical('https://avestot.com/consultant');
            SEOTools::opengraph()->addProperty('type', 'articles');
            SEOTools::twitter()->setSite('@avestot');
    
            return view('consultant',[
                'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
                'posts' => User::where('type','operator')->orderBy('created_at', 'desc')->get(),
            ]);
        }

    
    public function CreateConsultant(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'] ,
            'title' => ['required', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'number' => ['required', 'regex:/^(09[0-9]{9})|(۰۹[۰-۹]{9})$/'],
            'sex' => ['required', 'string', 'max:255'] ,
            'age' => ['required', 'string', 'max:255'],
            'explain' => ['nullable', 'string', 'max:255'],
        ]);

        $post = new consultant([
            'title' => $request->input('name'),
            'name' => $request->input('title'),
            'number' => $request->input('number'),
            'city' => $request->input('city'),
            'sex' => $request->input('sex'),
            'explain' => $request->input('explain'),
            'age' => $request->input('age'),
            'email'=>Auth::user()->email,
            'description' => $request->input('content'),
        ]);
        $post->save();
        return redirect()->route('dashboard.customer.consultant.manage')->with('info', '  مشاوره جدید ذخیره شد و نام آن' .' ' . $request->input('name'));
    }

    public function services() {

        SEOTools::setTitle('اوستا');
        SEOTools::setDescription('درباره تیم ایران مد اس ال پی از بیمارستان نیکان بیشتر بدانید . تیمی قوی با پشتوانه علمی مدرن');
        SEOTools::opengraph()->setUrl('http://avestot.com/services');
        SEOTools::setCanonical('https://avestot.com');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');

        return view('services',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
        ]);
    }

    public function find() {

        SEOTools::setTitle('اوستا');
        SEOTools::setDescription('درباره تیم ایران مد اس ال پی از بیمارستان نیکان بیشتر بدانید . تیمی قوی با پشتوانه علمی مدرن');
        SEOTools::opengraph()->setUrl('http://avestot.com/find');
        SEOTools::setCanonical('https://avestot.com');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');

        return view('find',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
            'posts' => Post::where('show_at','<',carbon::now())->orWhere('show_at',NULL)->orderBy('created_at','desc')->paginate(10)
           
        ]);
    }

    public function Procedure() {

        SEOTools::setTitle('اوستا');
        SEOTools::setDescription('درباره تیم ایران مد اس ال پی از بیمارستان نیکان بیشتر بدانید . تیمی قوی با پشتوانه علمی مدرن');
        SEOTools::opengraph()->setUrl('http://avestot.com/procedure');
        SEOTools::setCanonical('https://avestot.com');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');

        return view('procedure',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
        ]);
    }

    public function Pro(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'] ,
            'title' => ['required', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'number' => ['required', 'regex:/^(09[0-9]{9})|(۰۹[۰-۹]{9})$/'],
            'user_id' => ['required','exists:users,id'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'content' => ['required'],
            'file' => ['nullable'],
            'sex' => ['required', 'string', 'max:255'] ,
            'age' => ['required', 'string', 'max:255'],
            'explain' => ['nullable', 'string', 'max:255'],
        ]);

        $post = new procedure([
            'title' => $request->input('name'),
            'name' => $request->input('title'),
            'number' => $request->input('number'),
            'city' => $request->input('city'),
            'email'=>$request->input('email'),
            'sex' => $request->input('sex'),
            'explain' => $request->input('explain'),
            'age' => $request->input('age'),
            'user_id'=> $request->input('user_id'),
            'description' => $request->input('content'),
        ]);
        if($request->hasfile('file'))
        {
        $uploadedFile = $request->file('file');
        $filename = $uploadedFile->getClientOriginalName();
        Storage::disk('local')->putFileAs('/file/'.$filename, $uploadedFile, $filename);
        $post->file = $filename;
        }
        $post->save();
        return redirect()->route('procedure')->with('info', '  ارزیابی جدید ثبت شد و پس از بررسی با شما تماس گرفته خواهد شد . نام ارزیابی' .' ' . $request->input('name'));
    }
    
    //ASHOURA EDITS
    
    
    public function Problem() {

        SEOTools::setTitle('اوستا');
        SEOTools::setDescription('بررسی مشکل بیماران در ایران مد اس ال پی');
        SEOTools::opengraph()->setUrl('http://avestot.com/problem');
        SEOTools::setCanonical('https://avestot.com');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');

        return view('problem',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
        ]);
    }
    
    public function khalili() {

        SEOTools::setTitle('اوستا');
        SEOTools::setDescription('این پرسشنامه برای بررسی اختلال بلع در بیماران ام اس طراحی شده است. لطفا پس از تکمیل اطلاعات به سوالات یک تا ده با انتخاب یکی از گزینه‌های بلی یا خیر پاسخ بدهید.');
        SEOTools::opengraph()->setUrl('http://avestot.com/khalili');
        SEOTools::setCanonical('https://avestot.com');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');

        return view('khalili',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
        ]);
    }
    
    
    public function category($slug) {

        //$pros=array();
        $category=postcategory::where('slug' , $slug)->FIRST();
        SEOTools::setTitle('ایران مد اس ال پی-'.$category->name);
        SEOTools::setDescription($category->desccription);
        SEOTools::opengraph()->setUrl('http://avestot.com/category/'.$slug);
        SEOTools::setCanonical('http://avestot.com/category/'.$slug);
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');
        

        $posts = Post::where('category' , $category->id)->where('show_at','<',carbon::now())->orWhere('show_at',NULL)->orderBy('created_at','desc')->paginate(10);
        return view('category',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
            'posts' => $posts,
            'category'=> $category,
        ]);

        
    }

    public function response() {

        SEOTools::setTitle('اوستا');
        SEOTools::setDescription('در اینجا تجربه بیماران ایران مد اس ال پی را مشاهده خواهید کرد');
        SEOTools::opengraph()->setUrl('http://avestot.com/responses/');
        SEOTools::setCanonical('http://avestot.com');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@avestot');
        

        $posts = response::where('status' , 'accept')->orderBy('id','desc')->paginate(10);
        return view('responses',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
            'archive' => Post::where('show_at','<',carbon::now())->orWhere('show_at',NULL)->orderBy('created_at','desc')->get(),
            'posts' => $posts,
        ]);

        
    }



    public function ParvandeShow() {


        return view('show',[
            'categories' => Category::whereNull('parent_id')->with('allChildren')->get(),
        ]);
    }


}
