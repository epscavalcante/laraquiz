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
                <section class="jumbotron py-3">

                    <header>
                        <h5><strong>Question {{ $question->id }}:</strong> {{ $question->title }}</h5>
                        <p><strong>More:</strong> {{ $question->subtitle }}</p>
                    </header>

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
                        <li><strong>Explanation:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo laboriosam minus rerum aliquam a aliquid maiores sequi, distinctio dolorum, quia officia dicta quas illo qui autem necessitatibus quae laborum quidem?</li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
@endsection