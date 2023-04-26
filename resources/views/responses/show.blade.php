@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $response->title }}
        </div>

        <div class="panel-body">
            <img src="{{ asset($response->filepath) }}" alt="Response Image" style="width: 80%; height: auto;">
        </div>

        <div class="panel-footer" style="width: 80%;">
            <form method="POST" action="{{ route('boards.store') }}">
                @csrf
                <input type="hidden" name="response_id" value="{{ $response->id }}">
                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea name="comment" id="comment" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">投稿する</button>
            </form>
        </div>
    </div>
@endsection
