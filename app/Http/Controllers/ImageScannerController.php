<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use Response;
use App\User;
use App\Text;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Google\Cloud\Vision\VisionClient;
use GuzzleHttp\Exception\GuzzleException;

class ImageScannerController extends Controller
{
    //
    public function index(Request $request)
    {
    	try {
    		return view("imageScanner");
    	} catch (Exception $e) {
    	}
    }

    public function editText(Request $request,$history_id)
    {
      try {
        $text = Text::where('user_id',Auth::user()->id)->where('id',$history_id)->first();
        return view("edit_history",compact("text"));
      } catch (Exception $e) {
      }
    }

    public function saveText(Request $request,$history_id)
    {
      try {
        $text = Text::where('user_id',Auth::user()->id)->where('id',$history_id)->first();
        $text->image_file_content = $request->input('image_file_content');
        $text->save();
        return redirect()->route('editText',$history_id);
      } catch (Exception $e) {
      }
    }

    public function download(Request $request,$history_id)
    {
      try {
        $text = Text::where('user_id',Auth::user()->id)->where('id',$history_id)->first();
        $myName = "ThisDownload.txt";
        $headers = ['Content-type'=>'text/plain',
                    'Content-Disposition'=>sprintf('attachment; filename="%s"', $myName),
                    'Content-Length'=>sizeof($text->image_file_content)
                  ];
        return Response::make($text->image_file_content, 200, $headers);
      } catch (Exception $e) {
      }
    }

    public function getHistory(Request $request,$history_id)
    {
      try {
        $text = Text::where('user_id',Auth::user()->id)->where('id',$history_id)->first();
        return view("single_history",compact("text"));
      } catch (Exception $e) {
      }
    }

    public function history(Request $request)
    {
      try {
        $texts = Text::where('user_id',Auth::user()->id)->paginate(6);
        return view("history",compact("texts"));
      } catch (Exception $e) {
      }
    }
    public function Dashboard(Request $request)
    {
      try {
        $texts = Text::where('user_id',Auth::user()->id)->take(4)->get();
        return view("dashboard",compact("texts"));
      } catch (Exception $e) {
      }
    }

    public function scanText(Request $request)
    {
    	try {
        $texts = array();
    		if($request->hasFile('image-file')) {
          $path = $request->file('image-file')->store('Images');
          $api_key = env('GOOGLE_API_KEY');
          $key_file = env('GOOGLE_APPLICATION_CREDENTIALS');
          $projectId = env('GOOGLE_PROJECT_ID');
          putenv('GOOGLE_APPLICATION_CREDENTIALS='.public_path($key_file));
		      $vision = new VisionClient([
            'projectId' => $projectId,
          ]);
          $image = $vision->image(file_get_contents(storage_path("app/public/".$path)), ['DOCUMENT_TEXT_DETECTION']);
          $result = $vision->annotate($image);
          $texts = (array) $result->text();
        }
        $text = new Text();
        $text->image_file_path = $path;
        $text->image_file_content = $texts[0]->description();
        $text->user_id = Auth::user()->id;
        $text->save();
        return redirect()->route('editText',$text->id);
    	} catch (Exception $e) {
    	}
    }
}
