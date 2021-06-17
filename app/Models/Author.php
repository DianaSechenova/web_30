<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function show_authors()
    {
        $authors =  Author::orderBy('count_posts', 'DESC')
            ->limit(5)
            ->get();

        $count = Author::all()->count();
        return $authors;

    }

    public function show_count_authors()
    {

        return Author::all()->count();


    }
}
