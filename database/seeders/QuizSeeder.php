<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Quiz;
use App\Models\Section;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::create([
            'title'=>'PHP',
            'descriptions'=>'это распространённый язык программирования общего назначения с открытым исходным кодом. PHP специально сконструирован для веб-разработок и его код может внедряться непосредственно в HTML.',
            'status'=>1,
            'resolution'=>1,
          ]);
           
           Section::create([
           'quiz_id'=>1,
           'title'=>'Тест по основам PHP'
          ]);
           
          Question::create([
           'section_id'=>1,
           'title'=>'Что будет в переменной $result после выполнения кода $result = 2 + 2 * 2;?'
          ]);

          Answer::create([
           'question_id'=>1,
           'correct_answers'=>'6',
           'answers'=>1
          ]);

          Answer::create([
            'question_id'=>1,
            'correct_answers'=>'2',
            'answers'=>0,
           ]);

           Answer::create([
            'question_id'=>1,
            'correct_answers'=>'4',
            'answers'=>0,
           ]);

           Answer::create([
            'question_id'=>1,
            'correct_answers'=>'8',
            'answers'=>0,
           ]);

           Question::create([
            'section_id'=>1,
            'title'=>'Что будет в переменной $result после выполнения кода $result = (true xor true)?'
           ]);

           Answer::create([
            'question_id'=>2,
            'correct_answers'=>'true',
            'answers'=>1,
           ]);
 
           Answer::create([
             'question_id'=>2,
             'correct_answers'=>'0',
             'answers'=>0,
            ]);
 
            Answer::create([
             'question_id'=>2,
             'correct_answers'=>'1',
             'answers'=>0,
            ]);
 
            Answer::create([
             'question_id'=>2,
             'correct_answers'=>'false',
             'answers'=>0,
            ]);


            Question::create([
                'section_id'=>1,
                'title'=>'Что будет в переменной $result после выполнения кода $result = require 1.php, если в 1.php написан код <?php return 7 % 4;?'
               ]);
    
               Answer::create([
                'question_id'=>3,
                'correct_answers'=>'3',
                'answers'=>1,
               ]);
     
               Answer::create([
                 'question_id'=>3,
                 'correct_answers'=>'4',
                 'answers'=>0,
                ]);
     
                Answer::create([
                 'question_id'=>2,
                 'correct_answers'=>'2',
                 'answers'=>0,
                ]);
     
                Answer::create([
                 'question_id'=>3,
                 'correct_answers'=>'7',
                 'answers'=>0,
                ]);
    }
}
