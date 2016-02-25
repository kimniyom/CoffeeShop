<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Type extends Model {

    protected $table = 'tb_type';

    public function GetType() {
        $sql = "SELECT t.*,p.image_name FROM tb_type t INNER JOIN tb_photo p ON t.images = p.id";
        $result = DB::select($sql);

        return $result;
    }

    public function GetTypeWhere($id = null) {
        $sql = "SELECT t.*,p.image_name 
                  FROM tb_type t INNER JOIN tb_photo p ON t.images = p.id
                  WHERE t.id = '$id' ";
        $result = DB::select($sql);

        return $result;
    }

}
