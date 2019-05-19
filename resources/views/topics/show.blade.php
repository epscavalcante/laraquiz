@extends('layouts.app')

@section('content')

<div class="container">
    <form action="{{ route('tests.store') }}" method="POST" class="card">
        @csrf
        <input type="hidden" value="{{ $topic->id }}" name="topic_id">
        <div class="card-header">
            <span class="card-title">{{ $topic->title }}</span>
        </div>
        <div class="card-body">
            @foreach ($topic->questions as $question)
                <h4>{{ $question->title }}</h4>
                
                <ol type="A">
                    @foreach($question->options as $option)
                    <li>
                        <input type="radio" name="answers[][{{ $question->id }}]" value="{{ $option->id }}">
                        {{ $option->title }}
                    </li>
                    @endforeach
                    
                </ol>


                <hr>
            @endforeach

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success">Do it</button>
        </div>
    </div>
</div>
    
@endsection