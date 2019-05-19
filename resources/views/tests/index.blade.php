@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">My tests</div>
            <div class="card-body">
                @foreach ($tests as $test)
                    <a href="{{ route('myTests.show', $test) }}" class="list-group-item list-group-item-action">
                        <h6 class="font-weight-bold">Tópic: {{ $test->topic->title }}</h6>  
                        <small>Maked in {{ $test->created_at }}</small>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection