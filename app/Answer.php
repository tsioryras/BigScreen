<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    /**
     * @var array
     */
    protected $casts = [
        'content' => 'array'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'url', 'email', 'content',
    ];
}
