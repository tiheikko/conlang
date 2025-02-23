<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    public function category(): BelongsTo {
        return $this->belongsTo(ArticleCategory::class, 'article_category_id');
    }
}
