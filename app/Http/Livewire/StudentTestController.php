<?php

namespace App\Http\Livewire;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Answer;
use Livewire\Component;
use Illuminate\Http\Request;

class StudentTestController extends Component
{
    public $request;
    public function render()
    {
        $user= User::findOr(auth()->id(), fn () => abort(404));
        if($user->hasRole('incoming')){
            $quizzes= Quiz::with('section.question.answer')->get();
            return view('livewire.student-test-controller',compact('quizzes'));
        }
        else{
            abort(404);
        }
       
        
    }

    public function submit(Request $request){
        $this->request=$request;
        $quantity=0;
        $correct_answers=0;
        $answers=$this->request->toArray();
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
