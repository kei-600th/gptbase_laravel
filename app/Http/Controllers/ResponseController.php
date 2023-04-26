<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Models\Response;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
 
class ResponseController extends Controller
{

    public function index(Request $request)
    {
        $new_path = "storage/new";
        $str_path = "storage/";
    
        if (File::exists(public_path($new_path))) {
            $files = File::files(public_path($new_path));
            if (count($files) !== 0) {
                foreach ($files as $file) {
                    $filename = $file->getFilename();
                    $des_path = public_path("$str_path$filename");
                    $deletePath = config('app.delete_path');


                    File::move($file, $des_path);


                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
                    $title = str_replace(".$extension", '', $filename);
                    $des_path = str_replace($deletePath, '', $des_path);

                    Response::create([
                        'title' => $title,
                        'filepath' => $des_path,
                    ]);



                    
                    // echo $filename . "ファイルを移動しました" . "<br>";
                }
                echo "新しい対話ログを追加しました!";
            } else {
            }
        } else {
            echo "ディレクトリが存在していません";
        }

        $responses = Response::orderBy('created_at', 'desc')->get();
        return view('responses.index', [
            'responses' => $responses,
        ]);
    }



    public function show($id)
    {
        $response = Response::find($id);
        return view('responses.show', ['response' => $response]);
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