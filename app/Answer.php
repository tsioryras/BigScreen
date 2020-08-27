<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'value'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
