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
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">

        <div class="container-card" style="height:150px; background: none;">
            <div class="img-wrapper">
                <img src="{{url('uploads/'.$type['image_name'])}}" style="max-height: 150px;" class="img-responsive img-thumbnail">
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-9 col-lg-8">
        <h4 style="font-weight: bold;" id="h4">สินค้าประเภท {{$type['type_name']}}</h4>
        <p>จำนวน <span class=" badge">0</span> ชิ้น</p>
        
        <a href="{{url('backend/product/create',['type_id' => $type['id']])}}">
            <button type="button" class="btn btn-success outline">
                <i class="fa fa-plus"></i> เพิ่มสินค้า
            </button></a>
    </div>
</div>

<hr id="hr"/>
@if($product)
<div class="row">
    @foreach($product as $rs)
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-4">

        <div class="container-card" style="height:150px; background: none;">
            <div class="img-wrapper">
                <img src="{{url('uploads/'.$rs->image_name)}}" style="max-height: 150px;" class="img-responsive img-thumbnail">
            </div>
        </div>

        <h4 style="font-weight: bold;">{{$rs->product}}</h4>
        <p>ราคา <span class=" badge">{{$rs->price}}</span> บาท</p>
        <p>
            <a href="{{url('backend/product/update/'.$rs->id)}}">
                <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> แก้ไข</button></a>
            <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> ลบ</button>
        </p>
        <hr/>
    </div>
    @endforeach
</div>
@endif
@stop
