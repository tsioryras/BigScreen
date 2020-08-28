<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return JsonResponse
     */
    public function questions()
    {
        $questions = Question::all();
        $questionsDetails = [];
        foreach ($questions as $question) {
            $questionsDetails[] = [
                'id' => $question->id,
                'label' => $question->label,
                'type' => $question->type['value']
            ];
        }
        return new JsonResponse($questionsDetails);
    }

    /**
     * @return JsonResponse
     */
    public function answers()
    {
        $answersGroups = DB::table('answers')->get()->groupBy('link_id');
        $answersGroupsDetails = [];
        foreach ($answersGroups as $answersGroup) {
            $answerDetail = [];
            foreach ($answersGroup as $answer) {

                $answerDetail[] = [
                    'id' => $answer->id,
                    'label' => Question::find($answer->question_id)->label,
                    'value' => $answer->value
                ];
            }
            $answersGroupsDetails[] = $answerDetail;
        }

        return new JsonResponse($answersGroupsDetails);
    }

    /**
     * @return JsonResponse
     */
    public function statsData()
    {
        $answer6 = Answer::retrieve(6);
        $answer7 = Answer::retrieve(7);
        $answer10 = Answer::retrieve(10);

        $answer11 = Answer::retrieve(11);
        $answer12 = Answer::retrieve(12);
        $answer13 = Answer::retrieve(13);
        $answer14 = Answer::retrieve(14);
        $answer15 = Answer::retrieve(15);

        $equipmentStats = [
            'question6' => $answer6,
            'question7' => $answer7, '
            question10' => $answer10
        ];

        $qualityStats = [
            'question11' => $answer11,
            'question12' => $answer12,
            'question13' => $answer13,
            'question14' => $answer14,
            'question15' => $answer15
        ];

        return new JsonResponse(['equipment' => $equipmentStats, 'quality' => $qualityStats]);
    }

}
