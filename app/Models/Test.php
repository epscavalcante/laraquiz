<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['user_id', 'topic_id'];
    protected $with = ['topic'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
