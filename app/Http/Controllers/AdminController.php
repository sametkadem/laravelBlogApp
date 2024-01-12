<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $userId = Auth::id();
        $blogs = $this->blogsModel->getBlogsByUserId($userId);

        foreach ($blogs as $blog) {
            $blog->category_name = $this->categoryModel->getCategoryById($blog->category_id);
        }

        return view('admin.blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog = $this->blogsModel->getBlogById($id);
        return view('admin.blogs.show', compact('blog'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
    }
}
