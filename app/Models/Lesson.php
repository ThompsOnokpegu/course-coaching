<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    use HasFactory;

    protected $fillable = ['topic_id', 'title', 'content', 'video_url'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
