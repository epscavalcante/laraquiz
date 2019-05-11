@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <span class="card-title">Topics</span>
        </div>
        <div class="card-body">
            <div class="border p-3">

                <span class="font-weight-bold mb-4">Manager Topic</span>
                
                <form action="{{ request()->route()->getName() === 'topics.index' ? route('topics.store') : route('topics.update', $topic) }}" method="POST">
                    @csrf
                    @if(request()->route()->getName() === 'topics.edit')
                        @method("PUT")
                    @endif

                    <div class="row">

                        <div class="col-10">
                            <div class="form-group">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Create a new topic">
                                @error('title') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @endif
                            </div>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-success btn-block">Save topic</button>
                        </div>
                    </div>
                </form>

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Topic</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th width='10'></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topics as $topic)
                            <tr class="@if($topic->trashed) table-danger @endif">
                                <td>{{ $topic->title }}</td>
                                <td>{{ $topic->created_at }}</td>
                                <td>{{ $topic->updated_at }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('topics.show', $topic) }}" class="btn btn-sm btn-primary">Open</a>
                                        <a href="{{ route('topics.edit', $topic) }}" class="btn btn-sm btn-secondary">Edit</a>
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