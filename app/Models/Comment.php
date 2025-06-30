<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['body', 'post_id'];

        // $comment->post

        public function comment()
        {
            return $this->belongsTo(Comment::class);
        }
}
