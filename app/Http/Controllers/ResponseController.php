<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Models\Response;
 
class ResponseController extends Controller
{
    /**
        * タスク一覧
        *
        * @param Request $request
        * @return Response
        */
    public function index(Request $request)
    {
        $responses = Response::orderBy('created_at', 'asc')->get();
        return view('responses.index', [
            'responses' => $responses,
        ]);
    }
 
    /**
        * タスク登録
        *
        * @param Request $request
        * @return Response
        */
    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|max:255',
        ]);
 
        // タスク作成
        Response::create([
        'url' => $request->url,
        'html' => 'HTMLコード',
        'css' => 'CSSコード'
        ]);

        return redirect('/responses');
    }
 
    /**
        * タスク削除
        *
        * @param Request $request
        * @param Response $response
        * @return Response
        */
    public function destroy(Request $request, Response $response)
    {
        $response->delete();
        return redirect('/responses');
    }
}