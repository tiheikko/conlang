<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'article_category_id',
        'title',
        'cover_path',
        'content'
    ];
    public function category(): BelongsTo {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }
}
