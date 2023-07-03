<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
  protected $table = 'posts';
  public $timestamps = true;

  protected $fillable = ['title', 'description', 'user_id'];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function website(): BelongsTo
  {
    return $this->belongsTo(Website::class);
  }
}
