@extends('layouts.master')

@section('content')
@livewireStyles
    <div class="md:container mx-auto">

        <form wire:submit.prevent="submit" action="/student-test/post" method="post" class="m-4">
            @csrf
            <div class="py-5">
                @foreach($quizzes as $quiz)
                    <div class="max-w-5xl mx-auto ">
                        <div class="overflow-hidden sm:rounded-lg  p-1">
                            <div class="text-center">
                                <h2><label for="exampleFormControlInput1 " class="form-label">{{$quiz->title}}</label>
                                </h2>
                            </div>
                            @foreach($quiz->section as $section)
                                <div class="text-center">
                                    <h3><label for="exampleFormControlInput1"
                                               class="form-label">{{$section->title}}</label>
                                    </h3>
                                </div>
                                @foreach($section->question as $question)

                                    <fieldset class="mb-10">
                                        <legend
                                            class="contents text-base font-medium text-gray-900">{{$question->title}}</legend>
                                        <div class="ml-10">
                                            @foreach($question->answer as $answer)
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-center">
                                                        <label for="answer-{{ $answer->id }}"
                                                               class="ml-3 block text-sm font-medium text-gray-700 w-full">
                                                            <input wire:model="name" id="answer-{{ $answer->id }}"
                                                                   name="{{$question->id}}"
                                                                   type="radio"
                                                                   value="{{$answer->id}}"
                                                                   class="focus:ring-indigo-500 mr-3 h-4 w-4 text-indigo-600 border-gray-300" required>
                                                            {{$answer->correct_answers}}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </fieldset>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                @endforeach
                
                <div class="text-center mt-1">
                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                        Button
                    </button>
                </div>
            </div>
        </form>
    </div>
     @livewireScripts
@endsection

