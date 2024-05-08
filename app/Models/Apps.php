<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apps extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'categories_id', 
        'name', 
        'username', 
        'email', 
        'password', 
        'description',
        'photos',
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
