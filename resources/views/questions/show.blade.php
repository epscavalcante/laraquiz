@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span class="card-title">Questions</span>

                <div class="float-right">
                    <strong>Question: {{ $question->id }}</strong>
                </div>
            </div>
            <div class="card-body">

                @if($question->is_homologated)
                @else
                <div class="alert alert-danger float-right">
                    <strong>Question not homologated</strong>
                    <a href="{{ route('options.index', $question) }}" class="btn btn-sm btn-danger">Editar</a>
                </div>
                @endif

                <section class="jumbotron py-3">

                    <div class="mb-4">
                        <h5><strong>{{ $question->title }}</strong></h5>
                        <i>{{ $question->subtitle }}</i>
                    </div>

                    <h6>Options:</h6>
                    
                    <ul class="mb-4">
                        @foreach ($question->options as $option)
                        <li>
                            {{ $option->title }} 
                            @if($option->is_correct)
                            <span class="badge badge-success">Is correct</span>
                            @endif
                        </li>
                        @endforeach
                    </ul>

                    <hr class="w-50">

                    <ul>
                        <li><strong>Option correct:</strong> {{ $question->optionCorrect->title }}</li>
                        <li><strong>Explanation:</strong> {{ $question->explanation }}</li>
                    </ul>
                </section>
            </div>
            
        </div>
    </div>
@endsection