<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Models\Response;

use GuzzleHttp\Client;
 
class ResponseController extends Controller
{

    public function index(Request $request)
    {
        $responses = Response::orderBy('created_at', 'asc')->get();
        return view('responses.index', [
            'responses' => $responses,
        ]);
    }
 

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
 
        Response::create([
        'title' => $request->title,
        'filepath' => 'ファイルパス',
        ]);

        return redirect('/responses');
    }
 

    public function destroy(Request $request, Response $response)
    {
        $response->delete();
        return redirect('/responses');
    }
}