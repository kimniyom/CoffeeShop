@extends('layout')
@section('content')
<?php

use Illuminate\Support\Facades\URL;

$breadcrumbs = new Creitive\Breadcrumbs\Breadcrumbs;
$breadcrumbs->setCssClasses('breadcrumb');
//$breadcrumbs->setDivider('<i class="right chevron icon divider"></i>');
$breadcrumbs->addCrumb('Home', Url::to('home'));
$breadcrumbs->addCrumb($title, '/');

echo $breadcrumbs->render();
?>
<hr/>
<a href="{{url('backend/type/create')}}">
    <button type="button" class="btn btn-success outline">
        <i class="fa fa-plus"></i> เพิ่มประเภทสินค้า
    </button></a>

<hr/>
@if($type)
<div class="row">
    @foreach($type as $rs)
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">

        <div class="container-card" style="height:150px; background: none;">
            <div class="img-wrapper">
                <img src="{{url('uploads/'.$rs->image_name)}}" style="max-height: 150px;" class="img-responsive img-thumbnail">
            </div>
        </div>

        <h4 style="font-weight: bold;">{{$rs->type_name}}</h4>
        <p>จำนวนสินค้า <span class=" badge">0</span> ชิ้น</p>
        <p>
            <a href="{{url('backend/type/update/'.$rs->id)}}">
                <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> แก้ไข</button></a>
            <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> ลบ</button>
        </p>
        <hr/>
    </div>
    @endforeach
</div>
@endif
<script>
    function add_type() {
        $('#popup-add-type').modal();
    }
</script>
@stop
