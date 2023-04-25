@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $response->title }}
        </div>

        <div class="panel-body">
            <img src="{{ asset($response->filepath) }}" alt="Response Image">
        </div>
    </div>
@endsection
