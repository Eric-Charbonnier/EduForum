<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
  use HasFactory;

  protected $table = 'forum_posts';

  protected $fillable = [
    'title',
    'title_fr',
    'body',
    'body_fr',
    'user_id',
    'date'
  ];

  protected $guarded = [
    'id'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function forumPostHasUser()
  {
    return $this->hasOne('App\Models\User', 'id', 'user_id');
    // model, clé primaire, clé etrangere qui vient de plus haut
  }
}
