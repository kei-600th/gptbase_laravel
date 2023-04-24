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
}