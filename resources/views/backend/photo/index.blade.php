@extends('layout')
@section('content')

<?php

use Illuminate\Support\Facades\URL;

$breadcrumbs = new Creitive\Breadcrumbs\Breadcrumbs;
$breadcrumbs->setCssClasses('breadcrumb');
//$breadcrumbs->setDivider('<i class="right chevron icon divider"></i>');
$breadcrumbs->addCrumb('Home', Url::to('home'));
$breadcrumbs->addCrumb('คลังรูปภาพ', '/');

echo $breadcrumbs->render();
?>

<form action="{{url('/backend/photo/action')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
    <div class="multiupload" id="gallery">
        <h1 class="" style="margin-top: 0px;">คลังรูปภาพ</h1>
        <div class="row">
            <ul class="preview" style="padding: 10px;"></ul>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-12 col-lg-12" id="container">
                <button class="btn btn-success outline" type="button" id="btn-select" name="btn-select" title="Upload image"><i class="fa fa-picture-o" ></i> Select Image</button>
                <button class="btn btn-primary outline" type="button" id="btn-upload"  name="btn-upload" title="Upload file"><i class="fa fa-upload" ></i> Upload</button>
            </div>
        </div>
    </div>

</form>
<hr/>

    <div class="image-view "></div>

<input type="hidden" id="base_path" value="<?php echo Url('') ?>"/>
<!-- เรียกใช้ jquery script ต่าง ๆ ที่ใช้เฉพาะหน้านี้ -->
<script type="text/javascript" src="{{url('/assets/plupload/js/plupload.full.min.js')}}"></script>
<script type="text/javascript" src="{{url('/assets/js/admin-uploader.js') }}"></script>

@stop
