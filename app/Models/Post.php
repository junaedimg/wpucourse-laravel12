<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function all()
    {
        return
            [
                [
                    'id' => 1,
                    'slug' => 'judul-artikel-1',
                    'title' => 'Judul Artikel 1',
                    'tanggal' => '29 juni 2001',
                    'author' => 'Junaedi Marojahan Gultom',
                    'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ad incidunt expedita! Dignissimos eum eos facere qui porro, ea magni deleniti! Et architecto iure perspiciatis quo voluptas numquam voluptatibus nam.'
                ],
                [
                    'id' => 2,
                    'slug' => 'judul-artikel-2',
                    'title' => 'Judul Artikel 2',
                    'tanggal' => '2 juni 2001',
                    'author' => 'Junaedi Marojahan Gultom',
                    'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ad incidunt expedita! Dignissimos eum eos facere qui porro, ea magni deleniti! Et architecto iure perspiciatis quo voluptas numquam voluptatibus nam.'
                ]
            ];
    }

    public static function find($slug)
    {
        return Arr::first(static::all(), fn($post) => $post['slug'] == $slug) ?? abort(404);;
    }
}
