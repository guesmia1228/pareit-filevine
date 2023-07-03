<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Website extends Model
{
  use  HasFactory;

  protected $table = 'websites';
  public $timestamps = true;

  public function users(): BelongsToMany
  {
    return $this->belongsToMany(User::class);
  }

  public function posts(): HasMany
  {
    return $this->hasMany(Post::class);
  }
}
