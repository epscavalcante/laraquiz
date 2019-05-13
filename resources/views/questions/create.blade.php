@extends('layouts.app')
@section('content')
<div class="container">
    <form class="card" action="{{ route('questions.store') }}" method="POST">
        @csrf
        <div class="card-header">
            <span class="card-title">Nova questão</span>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="topic_id" class="form-label">Tópic</label>
                <select name="topic_id" id="topic_id" class="custom-select @error('topic_id') is-invalid @enderror">
                    @foreach ($topics as $topic)
                        <option value="{{ $topic->id }}">{{ $topic->title }}</option>
                    @endforeach
                </select>
                @error('topic_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="title" class="form-label">Question</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="subtitle" class="form-label">Question subtitle</label>
                <input type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle" value="{{ old('subtitle') }}">
                @error('subtitle')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="explanation" class="form-label">Explanation of question correct *</label>
                <textarea name="explanation" class="form-control @error('explanation') is-invalid @enderror" id="explanation" rows="6">{{ old('explanation') }}</textarea>
                @error('explanation')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        <button class="btn btn-lg btn-primary px-5">Save</button>
    </div>

    </form>
</div>
@endsection