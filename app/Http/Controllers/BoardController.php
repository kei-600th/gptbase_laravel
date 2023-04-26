<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    public function store(Request $request)
    {
        // boardsテーブルに新しいコメントを追加する
        $board = new Board;
        $board->response_id = $request->input('response_id');
        $board->comment = $request->input('comment');
        $board->save();

        // 投稿完了後、元のレスポンスを表示するビューにリダイレクトする
        return redirect()->route('responses.show', $request->input('response_id'));
    }
}


