<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    protected $table = 'blogs'; // Tablo adı
    protected $fillable = ['title', 'content', 'user_id', 'category_id'];

    
    public function createBlog($data){
        return $this->create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'category_id' => $data['category_id'],
        ]);
    }

    public function getBlogById($id)
    {
        return $this->find($id);
    }

    public function getBlogsByUserId($user_id)
    {
        return $this->where('user_id', $user_id)->get();
    }

    public function updateBlogById($data)
    {
        return $this->where('id', $data['id'])->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'category_id' => $data['category_id'],
        ]);
    }

    public function deleteBlogsByIds($ids)
    {
        return $this->destroy($ids);
    }

    public function getAllBlogs()
    {
        return $this->all();
    }

    public function getUserNameById($id)
    {
        $user = db::table('users')->where('id', $id)->first();
        return $user->name;        
    }
}
