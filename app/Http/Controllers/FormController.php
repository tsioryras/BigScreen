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
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function answer($slug)
    {
        return view('answer', ['slug' => $slug.'$']);
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
                $validatorRules[$index] .= $index == 'field1' ? '|email' : '';
            }
        }

        $validateData = Validator::make($request->all(), $validatorRules);
        if ($validateData->fails()) {
            $errorMessage = [];
            foreach ($validateData->errors()->messages() as $index => $value) {
                foreach ($value as $error) {
                    $errorMessage[] = ($index == 'field1' || strpos($error, 'valid email')) ? 'L\'email n\'est pas valide' : 'Tous les champs sont obligatoires';
                }
            }
            return new JsonResponse(['status' => 400, 'message' => $errorMessage[0]]);
        }

        $dataToSave = [];
        foreach ($data as $index => $value) {
            if ($index != 'submit') {
                $dataToSave[str_replace('field', '', $index)] = $value;
            }
        }
        $link = factory(Link::class)->create(
            ['value' => substr(Hash::make(implode("", $dataToSave) . now()), 7, 23)]
        );

        foreach ($dataToSave as $index => $value) {
            $answer = factory(Answer::class)->create();
            $answer->value = $value;
            $answer->question()->associate(Question::find($index));
            $answer->link()->associate($link);
            $answer->save();
        }
        $errorMessage = "Toute l’équipe de Bigscreen vous remercie pour votre engagement. 
        Grâce à votre investissement, nous vous préparons une application toujours plus 
        facile à utiliser, seul ou en famille.Si vous désirez consulter vos réponse 
        ultérieurement, vous pouvez consultez cette adresse:";

        return new JsonResponse(['status' => 200, 'message' => $errorMessage, 'link' => url('/') . "/" . $link->value]);
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
     * @param $slug
     * @return JsonResponse
     */
    public function answersByUser($slug)
    {
        $answers = Answer::retrieveOneAnswer($slug);
        return new JsonResponse($answers);
    }
}
