@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($data as $item)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-0 text-muted">{{ $item['title'] }}</h3>

                    <h1 class="float-right mb-0">{{ $item['counter'] }}</h1>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <hr class="my-5 w-50">

    <div class="card">
        <div class="card-header">
            <h6>Tests available</h6>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach($topics as $topic)
                <a href="{{ route('topics.show', $topic) }}" class="list-group-item list-group-item-action">
                    {{ $topic->title }}
                </a>
                @endforeach
            </ul> 
        </div>
    </div>
</div>
@endsection
