<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Symfony\Component\HttpFoundation\JsonResponse;

class FormController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
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
                'choice' => $question->choice['content'],
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
        return new JsonResponse(Answer::all());
    }
}
