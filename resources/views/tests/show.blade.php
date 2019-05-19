@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6>Tópic: {{ $test->topic->title }}</h6>
            </div>
            <div class="card-body">
                <div class="jumbotron">
                    
                    <h3>
                        Results
                        <div class="float-right">

                            @php
                            $count = 0;
                            @endphp

                            @foreach($test->topic->questions as $question)
                                @foreach($test->answers as $answer)
                                    @if($question->optionCorrect->id === $answer->option_id)
                                    @php
                                    $count++;
                                    @endphp
                                    @endif
                                @endforeach
                            @endforeach

                            {{ $count }}
                            
                            /

                            {{ $test->topic->questions->count() }}
                        </div>
                    </h3>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Option correct</th>
                                <th>Your Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($test->topic->questions as $question)
                            <tr>
                                <td>{{ $question->id }} {{ $question->title }}</td>
                                <td>[{{ $question->optionCorrect->id }}] {{ $question->optionCorrect->title }}</td>
                                <td>

                                    @foreach($test->answers as $answer)
                                    @if($question->id === $answer->question_id)
                                    {{-- questão igual da minha resposta {{ $answer->question_id }} --}}
                                        @if($question->optionCorrect->id === $answer->option_id)
                                        <span class="badge badge-success">Acertoou</span>
                                        @else
                                        <span class="badge badge-danger">Não acertoou</span>
                                        @endif
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @foreach ($test->topic->questions as $question)
                <div>
                    <h4>{{ $question->title }}</h4>
                    
                    {{-- @if($test->answers->contains('option_id',$option->id) && $option->is_correct) list-group-item-success 
                    <div class="alert alert-success float-right">
                        Your answer is correct!!!
                    </div>
                    @endif --}}



                    <ol type="A">
                        @foreach($question->options as $option)
                        <li class="">
                            {{ $option->title }}
    
                            @if($option->is_correct)
                            <span class="badge badge-success">
                                Correct
                            </span>
                            @endif
    
                            @if($test->answers->contains('option_id',$option->id))
                            <span class="badge badge-primary">
                                Your answer
                            </span>
                            @endif
    
                        </li>
                        @endforeach
                    </ol>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection 