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
     * @return array
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
            'marque VR utilisée' => $this->equipmentStats($answer6),
            'magasin d\'achat VR' => $this->equipmentStats($answer7),
            'usages principale de Bigscreen' => $this->equipmentStats($answer10)
        ];

        $qualityStats = [
            "Qualité de l'image " => $this->qualityStats($answer11),
            "Confort d'utilisation de l'interface " => $this->qualityStats($answer12),
            "Connection au réseau " => $this->qualityStats($answer13),
            "Qualité graphisme 3D" => $this->qualityStats($answer14),
            "Qualité audio" => $this->qualityStats($answer15)
        ];

        return ['equipment' => $equipmentStats, 'quality' => $qualityStats];
    }

    /**
     * @param $datas
     * @return array
     */
    public function equipmentStats($datas)
    {
        $result = [];
        foreach ($datas as $index => $value) {
            $result[$index] = sizeof($value);
        }
        return $result;
    }

    /**
     * @param $datas
     * @return float|int
     */
    public function qualityStats($datas)
    {
        $number = 0;
        $total = 0;
        foreach ($datas as $value) {
            $note = (int)$value[0]->value;
            $total += sizeof($value) * $note;
            $number += sizeof($value);
        }
        return $total / $number;
    }

}
