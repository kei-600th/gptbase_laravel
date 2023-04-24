@extends('layouts.app')
 
@section('content')
 
<!-- タスク登録用パネル… -->
<div class="panel-body">
    <!-- バリデーションエラーの表示 -->
    @include('common.errors')
 
    <!-- 新タスクフォーム -->
    <form action="{{ url('response') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
 
        <!-- タスク名 -->
        <div class="form-group">
            <label for="response-question" class="col-sm-3 control-label">Response</label>
 
            <div class="col-sm-6">
                <input type="text" name="question" id="response-question" class="form-control">
            </div>
        </div>
 
        <!-- タスク追加ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Response
                </button>
            </div>
        </div>
    </form>
</div>
 
<!-- タスク一覧表示 -->
@if (count($responses) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Current Responses
    </div>
 
    <div class="panel-body">
        <table class="table table-striped response-table">
 
            <!-- テーブルヘッダ -->
            <thead>
                <th>Response</th>
                <th>&nbsp;</th>
            </thead>
 
            <!-- テーブル本体 -->
            <tbody>
                @foreach ($responses as $response)
                <tr>
                    <!-- タスク名 -->
                    <td class="table-text">
                        <div>{{ $response->question }}</div>
                    </td>
 
                    <td>
                        <!-- TODO: 削除ボタン -->
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