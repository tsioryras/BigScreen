<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $casts = [
        'content' => 'array'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'type', 'content'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne(Type::class);
    }
}
