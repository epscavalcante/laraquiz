<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['user_id', 'topic_id', 'question_id', 'option_id'];
}
