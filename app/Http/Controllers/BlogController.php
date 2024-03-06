<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::where('user_id', Auth::user()->id)->paginate(5);
        return view("theme.blogs.index", compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("theme.blogs.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();

        /**
         * ===== Uploading Image =====
            1- get image
            2- change the current name for image
            3- move image for my project
            4- save new name to database record
         */

        // Get Image
        $image = $request->image;

        // Change Name
        $newImageName = time() . "_" . $image->getClientOriginalName(); // example -> "1709554224_cat-1.jpg"

        // Move image for my project
        $image->storeAs('blogs', $newImageName, 'public');

        // Save new name to database record
        $data['image'] = $newImageName;

        $data['user_id'] = Auth::user()->id;


        // Create new blog record
        Blog::create($data);

        return back()->with('successBlog', 'your blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.blog-details', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if ($blog->user_id = Auth::user()->id) {

            $categories = Category::all();
            return view('theme.blogs.edit', compact('blog', 'categories'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if ($blog->user_id = Auth::user()->id) {

            $data = $request->validated();

            if ($request->hasFile('image')) {

                Storage::delete("public/blogs/$blog->image");
                // Get Image
                $image = $request->image;
                // Change Name
                $newImageName = time() . "_" . $image->getClientOriginalName();

                // Move image for my project
                $image->storeAs('blogs', $newImageName, 'public');

                // Save new name to database record
                $data['image'] = $newImageName;
            }
            // Update blog record
            $blog->update($data);

            return back()->with('successBlogUpdate', 'your blog updated  successfully');
        }

        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->user_id = Auth::user()->id) {

            Storage::delete("public/blogs/$blog->image");
            $blog->delete();
            return back()->with("successBlogDelete", "your blog Deleted  successfully");
        }
    }
}
