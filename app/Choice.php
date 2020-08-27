<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    /**
     * @var array
     */
    protected $casts = [
        'content' => 'array'
    ];

    protected $fillable = [
        'label', 'content'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function question()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
