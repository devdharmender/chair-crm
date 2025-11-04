<?php

namespace App\Models\pages;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    public $timestramps = false;
    protected $fillable = [
        'title',
        'blog_img',
        'metatitle',
        'metakeyword',
        'canonical',
        'metadesc',
        'topic',
        'description',
    ];
}
