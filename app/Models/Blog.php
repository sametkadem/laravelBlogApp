<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs'; // Tablo adı
    protected $fillable = ['title', 'content', 'user_id', 'category_id'];

    public function createOrUpdateBlog($data)
    {
        return $this->updateOrCreate(
            ['id' => $data['id']],
            [
                'title' => $data['title'],
                'content' => $data['content'],
                'user_id' => $data['user_id'],
                'category_id' => $data['category_id'],
            ]
        );
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

    public function deleteBlogById($id)
    {
        return $this->destroy($id);
    }
}
