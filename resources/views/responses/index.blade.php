@extends('layouts.app')
 
@section('content')
 
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
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection