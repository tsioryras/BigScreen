<?php

namespace App\Http\Controllers;

use App\Link;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
     * @param Request $request
     * @return JsonResponse
     */
    public function sendAnswer(Request $request)
    {
        $data = $request->request;
        $validatorRules = [];
        foreach ($data as $index => $value) {
            if ($index != 'submit') {
                $validatorRules[$index] = 'required|max:255';
                $validatorRules[$index] .= $index == 'field1' ? '|email|unique' : '';
                $validatorRules[$index] .= $index == 'field2' ? '|integer|min:1' : '';
            }
        }

        $validateData = Validator::make($request->all(), $validatorRules);
        if ($validateData->fails()) {
            return new JsonResponse($validateData->errors());
        }


        $link = factory(Link::class)->create();
        $link->value = Hash::make($data["fie1d1"] . now());

//        foreach ($data as $index => $value) {
//            $answer = factory(Answer::class)->create();
//            $answer->value = $value;
//            $answer->question()->associatet(Question::find($index));
//            $answer->link()->associate($link);
//            $answer->save();
//        }

        return new JsonResponse($validatorRules);
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

//    /**
//     * @return JsonResponse
//     */
//    public function answers()
//    {
//        return new JsonResponse(Answer::all());
//    }
}
