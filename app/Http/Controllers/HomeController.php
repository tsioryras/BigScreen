<?php

namespace App\Http\Controllers;

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

}
