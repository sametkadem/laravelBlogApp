<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; // Tablo adı
    protected $fillable = ['name'];


    public function getCategoryById($id)
    {
        $category = $this->find($id);
        return $category->name;
    }

}
