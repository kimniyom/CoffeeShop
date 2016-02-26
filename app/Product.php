<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model {

    protected $table = 'tb_product';

    public function Get_product($typeId = null) {
        $sql = "SELECT p.*,i.image_name
               FROM tb_product p INNER JOIN tb_photo i ON p.images = i.id
               WHERE p.type = '$typeId' ";
        return DB::select($sql);
    }

}
