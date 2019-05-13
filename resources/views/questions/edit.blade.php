@extends('layouts.app')
@section('content')
<div class="container">
    <form class="card" action="{{ route('questions.store') }}" method="POST">
        @csrf
        <div class="card-header">
            <span class="card-title">Nova questão</span>
        </div>
        <div class="card-body">
            


            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="topic_id" class="form-label">Tópic</label>
                        <select name="topic_id" id="topic_id" class="custom-select @error('topic_id') is-invalid @enderror">
                            @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}" {{ $question->topic_id === $topic->id ? 'selected' : ''  }}>{{ $topic->title }}</option>
                            @endforeach
                        </select>
                        @error('topic_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <label for="title" class="form-label">Question</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $question->title }}">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="subtitle" class="form-label">Question subtitle</label>
                <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle') ?? $question->subtitle }}">
                @error('subtitle')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">

                <label for="options" class="form-label">
                    Options 
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add
                    </button>
                </label>

                <form action="{{ route('options.store') }}" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    @csrf
                    <input type="hidden" value="{{ $question->id }}" name="question_id">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="optionTitle" class="form-label">Option</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="isCorrect" name="is_correct">
                                        <label class="custom-control-label" for="isCorrect">Is Question correct?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>

                <ul>

                    @foreach($question->options as $option)
                    <li>{{ $option->title }}</li>
                    @endforeach

                </ul>

            </div>

            <div class="form-group">
                <label for="explanation" class="form-label">Explanation of question correct *</label>
                <textarea name="explanation" class="form-control @error('explanation') is-invalid @enderror" id="explanation" rows="6">{{ old('explanation') ?? $question->explanation }}</textarea>
                @error('explanation')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        <button class="btn btn-lg btn-primary px-5">Save</button>
    </div>

    </form>
</div>
@endsection