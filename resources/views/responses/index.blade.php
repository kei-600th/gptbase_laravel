@extends('layouts.app')
 
@section('content')
 
@if (count($responses) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Current log
    </div>
 
    <div class="panel-body">
        <table class="table table-striped response-table">
 
            <thead>
                <th>ChatGPT</th>
                <th>&nbsp;</th>
            </thead>
 
            <tbody>
                @foreach ($responses as $response)
                <tr>
                <td class="table-text">
                    <div><a href="{{ url('response/'.$response->id) }}">{{ $response->title }}</a></div>
                </td>
 
                    <td>
                        <form action="{{ url('response/'.$response->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
 
                            <button type="submit" id="delete-response-{{ $response->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>削除
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection