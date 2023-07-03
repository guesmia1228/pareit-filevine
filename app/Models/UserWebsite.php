<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserWebsite extends Model
{
  use  HasFactory;

  protected $table = 'user_website';
  public $timestamps = false;
}
