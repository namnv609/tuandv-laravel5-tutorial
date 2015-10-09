<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model {

    protected $table = 'contents';
    protected $fillable = ['title', 'content', 'category_id', 'descreption'];

    public function category() {
        return $this->belongsTo(\App\Models\Category::class);
    }

}
