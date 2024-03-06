<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(4);
        $sliderBlogs = Blog::latest()->take(8)->get();
        return view('theme.index', compact('blogs', 'sliderBlogs'));
    }
    public function category($id)
    {
        $categoryName = Category::find($id)->name;
        $blogs = Blog::where('category_id', $id)->paginate(1);
        return view('theme.category', compact('blogs', 'categoryName'));
    }
    public function contact()
    {
        return view('theme.contact');
    }
    public function login()
    {
        return view('theme.login');
    }
    public function register()
    {
        return view('theme.register');
    }
    public function blogDetails()
    {
        return view('theme.blog-details');
    }
}
