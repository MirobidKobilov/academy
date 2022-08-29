<?php

namespace App\Http\Controllers;
use App\Models\Answer;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= User::findOr(auth()->id(), fn () => abort(404));
        if($user->hasRole('incoming')){
            $quizzes= Quiz::with('section.question.answer')->get();
            return view('student-test',compact('quizzes'));
        }
        else{
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quantity=0;
        $correct_answers=0;
        $answers= $request->toArray();
        $comparisons=Answer::all();
        foreach ($answers as $answer){
            foreach ($comparisons as $comparison){
                if ($answer ==(string) $comparison->id){
                    if($comparison->answers=='1'){
                        $correct_answers++;
                    }
                    $quantity++;
                }
            }
        }
        $percent=(100*$correct_answers)/$quantity;
        if($percent>=90){
            $user= User::findOr(auth()->id(), fn () => abort(404));
            $user->assignRole('enrollee');
            return redirect()->to('/zoom_booking');
        }
        else{
            return 'вы не могли набрать нужную количеству правильных ответов-> '.$correct_answers.'/'.$quantity.' это '.$percent."% процент должно быть больше или равно 90"  ;
        }

    }
}
