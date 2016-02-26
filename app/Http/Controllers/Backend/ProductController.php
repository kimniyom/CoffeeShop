<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Type;
use App\Http\Controllers\Controller;

class ProductController extends Controller {

    public function Index() {
        
    }

    public function Gettype($typeId = null) {
        $TypeModel = new Type();
        $result = $TypeModel->GetTypeWhere($typeId);
        $array = json_decode(json_encode($result), true);
        return $array[0];
    }

    public function Type($typeId = null) {
        $Type = $this->Gettype($typeId);
        $data['type'] = $Type;
        $data['title'] = $Type['type_name'];

        $Model = new Product();
        $data['product'] = $Model->Get_product($typeId);

        return view('backend/product/index', $data);
    }

    public function Create($typeId = null) {
        $Type = $this->Gettype($typeId);
        $data['type'] = $Type;

        $data['title'] = "เพิ่มสินค้า";
        $data['type_id'] = $typeId;
        return view('backend/product/create', $data);
    }

}
