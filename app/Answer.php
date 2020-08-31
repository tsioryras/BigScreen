<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function link()
    {
        return $this->belongsTo(Link::class);
    }

    /**
     * @param $value
     * @return \Illuminate\Support\Collection
     */
    public static function retrieve($value)
    {
        return DB::table('Answers')
            ->where('question_id', '=', $value)
            ->get()
            ->groupBy('value');
    }

    /**
     * @param $slug
     * @return array
     */
    public static function retrieveOneAnswer($slug)
    {
        $data = [];
        $link = DB::table('Links')
            ->where('value', '=', trim($slug, '$'))
            ->get();
        $answers = DB::table('Answers')
            ->where('link_id', '=', $link[0]->id)
            ->get();
        $data['date'] = date_format(new DateTime($link[0]->created_at), 'd.m.Y à H:i');
        foreach ($answers as $answer) {
            $data['data'][] = [
                'label' => Question::find($answer->question_id)->label,
                'answer' => $answer->value
            ];
        }
        return $data;
    }
}
