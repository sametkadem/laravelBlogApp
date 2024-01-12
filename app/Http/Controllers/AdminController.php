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
        $blog->categories = $this->categoryModel->get();
        return view('admin.blogs.show', compact('blog'));
    }

    public function updateBlog(Request $request, $id)
    {   
        try {
            $data = $request->all();
            $data['user_id'] = Auth::id();
            $data['id'] = $id;
            
            $this->blogsModel->updateBlogById($data);

            return redirect()->route('blogs.index')->with('success', 'Blog başarıyla güncellendi.');
        } catch (\Exception $e) {
            return redirect()->route('blogs.index')->with('error', 'Blog güncelleme sırasında bir hata oluştu.');
        }
    }

    public function createShow()
    {
        $categories = $this->categoryModel->get();
        return view('admin.blogs.create', compact('categories'));
    }

    public function createBlog(Request $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = Auth::id();

            $this->blogsModel->createBlog($data);

            return redirect()->route('blogs.index')->with('success', 'Yeni blog başarıyla oluşturuldu.');
        } catch (\Exception $e) {
            return redirect()->route('blogs.index')->with('error', 'Blog oluşturulurken bir hata oluştu.');
        }
    }

    public function deleteSelected(Request $request)
    {
        $selectedBlogs = $request->input('selectedBlogs', []);
        try {
            if (!empty($selectedBlogs)) {
                $this->blogsModel->deleteBlogsByIds($selectedBlogs);
                return redirect()->route('blogs.index')->with('success', 'Seçilen bloglar başarıyla silindi.');
            } else {
                return redirect()->route('blogs.index')->with('error', 'Silinecek blog bulunamadı.');
            }
        } catch (\Exception $e) {
            return redirect()->route('blogs.index')->with('error', 'Bloglar silinirken bir hata oluştu: ' . $e->getMessage());
        }
    }

}
