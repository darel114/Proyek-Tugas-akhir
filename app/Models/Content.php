<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'sub_category_id',
        'image_path',
        'admin_id', // 
    ];

    /**
     * Get the subcategory that owns the content.
     */
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }   

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}