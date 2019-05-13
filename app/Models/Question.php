<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    
    protected $fillable = ['topic_id', 'title', 'subtitle', 'explanation'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function optionCorrect()
    {
        return $this->hasOne(Option::class)->whereIsCorrect(true)->withDefault();
    }
}
