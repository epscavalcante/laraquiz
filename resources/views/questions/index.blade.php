@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="card-title mb-0">Questions</span>
            <a href="{{ route('questions.create') }}" class="btn btn-sm btn-primary">New</a>
        </div>
        <div class="card-body">
            <div class="border p-3">

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Topic</th>
                            <th>Question</th>
                            <th width='10'></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{ $question->topic->title }}</td>
                                <td>{{ $question->title }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('questions.show', $question) }}" class="btn btn-sm btn-primary">Open</a>
                                        <a href="{{ route('questions.edit', $question) }}" class="btn btn-sm btn-secondary">Edit</a>
                                        <a href="" class="btn btn-sm btn-danger">Del</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>        
        </div>
    </div>
</div>
@endsection