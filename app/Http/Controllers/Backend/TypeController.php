<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\Photo;
use App\Type;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller {

    public function Index() {
        $Model = new Type();
        $data['type'] = $Model->GetType();
        $data['title'] = "ประเภทสินค้า";
        return view('backend/type/index', $data);
    }

    public function Create() {
        $data['title'] = "เพิ่มประเภทสินค้า";
        return view('backend/type/create', $data);
    }

    public function Update($id = null) {
        $data['title'] = "แก้ไขประเภทสินค้า";
        $Model = new Type();
        $result = $Model->GetTypeWhere($id);
        $array = json_decode(json_encode($result), true);
        $data['model'] = $array[0];
        return view('backend/type/update', $data);
    }

    public function Saveupdate(Request $request) {
        $id = $request->input('id');
        $type_name = $request->input('type_name');
        $images = $request->input('images');

        $columns = array(
            'type_name' => $type_name,
            'images' => $images
        );
        DB::table('tb_type')
                ->where('id', $id)
                ->update($columns);
    }

    public function Images() {
        $data['images'] = Photo::orderBy('id', 'desc')->get();
        return view('backend/type/images', $data);
    }

    public function Save(Request $request) {
        $image = new \App\Type();
        $image->type_name = $request->input('type_name');
        $image->images = $request->input('images');
        $image->save();
    }

}
