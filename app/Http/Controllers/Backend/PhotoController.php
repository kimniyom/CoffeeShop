<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Photo;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PhotoController extends Controller {

    public function Index() {
        $data['images'] = Photo::orderBy('id', 'desc')->get();
        return view('backend/photo/index', $data);
    }

    public function Preview() {
        $data['images'] = DB::select('select * from tb_photo');
        return view('backend/photo/preview', $data);
    }

    public function Action(Request $request) {
        if ($request->exists('btn-multiupload')) {
            $file = $request->file('file');
            //$path = 'images/uploads';
            $type = substr($file->getClientOriginalName(), -4);
            $filename = str_random(32) . $type;

            $file->move('uploads', $filename);
            $image = new Photo;
            $image->image_name = $filename;
            $image->save();
            echo 'Uploaded';
        }
    }

    public function Delete(Request $request) {
        $id = $request->input('id');
        $result = DB::select('select * from tb_photo where id = :id', [':id' => $id]);
        $array = json_decode(json_encode($result), true);
        $rs = $array[0];
        if (file_exists("uploads/" . $rs['image_name'])) {
            unlink("uploads/" . $rs['image_name']);
        }
        DB::table('tb_photo')->where('id', '=', $id)->delete();
        //return view('backend/photo/preview', $data);
    }

    public function getTestpackage() {
        $img = Image::make('images/uploads/Koala.jpg')->resize(300, 200);
        return $img->response('jpg');
    }

}
