<?php

namespace App\Http\Controllers;

use App\Answer;
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
        for ($i = 0; $i < 20; $i++) {
            $validatorRules['field' . ($i + 1)] = 'required|max:255';
        }

        foreach ($data as $index => $value) {
            if ($index != 'submit') {
                $validatorRules[$index] .= $index == 'field1' ? '|email|unique' : '';
            }
        }
        $validateData = Validator::make($request->all(), $validatorRules);

        if ($validateData->fails()) {
            $errorMessage = [];
            foreach ($validateData->errors()->messages() as $index => $value) {
                foreach ($value as $error) {
                    $errorMessage[$index] = ($index == 'field1' && strpos($error, 'valid email')) ? 'L\'email n\'est pas valide' : 'Le champ est obligatoire';
                }
            }
            return new JsonResponse(['status' => 400, 'message' => $errorMessage]);
        }

        $dataToSave = [];
        foreach ($data as $index => $value) {
            if ($index != 'submit') {
                $dataToSave[str_replace('field', '', $index)] = $value;
            }
        }

        $link = factory(Link::class)->create();
        $link->value = Hash::make($data["fie1d1"] . now());

        foreach ($dataToSave as $index => $value) {
            $answer = factory(Answer::class)->create();
            $answer->value = $value;
            $answer->question()->associatet(Question::find($index));
            $answer->link()->associate($link);
            $answer->save();
        }

        return new JsonResponse(['status' => 200, 'message' => $link]);
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
