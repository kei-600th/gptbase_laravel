@extends('layouts.app')
 
@section('content')
 
<div class="panel-body">
    @include('common.errors')
 
    <form action="{{ url('response') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
 
        <div class="form-group">
            <label for="response-title" class="col-sm-3 control-label">Response</label>
 
            <div class="col-sm-6">
                <input type="text" name="title" id="response-title" class="form-control">
            </div>
        </div>
 
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Response
                </button>
            </div>
        </div>
    </form>
</div>
 
@if (count($responses) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Current Responses
    </div>
 
    <div class="panel-body">
        <table class="table table-striped response-table">
 
            <thead>
                <th>Response</th>
                <th>&nbsp;</th>
            </thead>
 
            <tbody>
                @foreach ($responses as $response)
                <tr>
                    <td class="table-text">
                        <div>{{ $response->title }}</div>
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