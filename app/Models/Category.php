<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description'];

    public function Topics()
    {
        return $this->hasMany(Category::class);
    }
}
