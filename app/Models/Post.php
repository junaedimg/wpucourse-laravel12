<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // #[Scope]
    protected function scopeFilter(Builder $query, array $fillters): void
    {
        $query->when($fillters['search'] ??  false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        });

        $query->when($fillters['category'] ??  false, function ($query, $category) {
            return $query->whereHas(
                'category',
                fn(Builder $query) => $query->where('slug', $category)
            );
        });

        $query->when($fillters['author'] ??  false, function ($query, $author) {
            return $query->whereHas(
                'author',
                fn(Builder $query) => $query->where('username', $author)
            );
        });
    }
}
