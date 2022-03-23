<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Image;
class FileUpload extends Controller
{
  public function createForm(){
    return view('image-upload');
  }

  public function fileUpload(Request $req){
    $req->validate([
      'file_name' => 'required',
      'file_name.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf'
    ]);

    if($req->hasfile('file_name')) {
        foreach($req->file('file_name') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->move(public_path().'/uploads/', $name);
            $imgData[] = $name;
        }
        $fileModal = new Image();
        $fileModal->file_name = json_encode($imgData);


        $fileModal->save();
       return back()->with('success', 'File has successfully uploaded!');
    }
  }
}
