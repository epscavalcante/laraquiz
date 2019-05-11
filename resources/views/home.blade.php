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
</div>
@endsection
