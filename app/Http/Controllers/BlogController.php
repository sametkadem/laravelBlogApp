<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogsModel;
    private $categoryModel;

    public function __construct(Blog $blogsModel, Category $categoryModel)
    {
        $this->blogsModel = $blogsModel;
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $blogs = $this->blogsModel->getAllBlogs();

        foreach ($blogs as $blog) {
            $blog->category_name = $this->categoryModel->getCategoryById($blog->category_id);
            $blog->user_name = $this->blogsModel->getUserNameById($blog->user_id);
        }
        return view('users.blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = $this->blogsModel->getBlogById($id);
        $blog->category_name = $this->categoryModel->getCategoryById($blog->category_id);
        return view('users.blogs.show', compact('blog'));
    }

    

}
