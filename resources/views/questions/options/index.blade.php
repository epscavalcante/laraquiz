@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <span class="card-title">Questions - Manange options </span>
        </div>
        <div class="card-body">
            Question {{ $question->id }}: {{ $question->title }}
            <p>{{ $question->subtitle }}</p>
            <p class="font-italic">Explanation of question: <pre>{{ $question->explanation }}</pre></p>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="card-title mb-0">Questions - Manange options </span>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add
            </button>
        </div>
        <div class="card-body">

            <form action="{{ route('options.store', $question) }}" class="mb-4" method="POST">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-7">
                        <div class="form-group">
                            <label for="optionTitle" class="form-label">Option</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="is_correct" class="form-label">Is correct?</label>
                            <select name="is_correct" id="is_correct" class="custom-select">
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-lg btn-primary mt-4">Save changes</button>
                    </div>
                </div>
            </form>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Option</th>
                        <th width='90'>Is correct?</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($question->options as $option)
                    <tr>
                        <td>{{ $option->title }}</td>
                        <td>{{ $option->is_correct }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection