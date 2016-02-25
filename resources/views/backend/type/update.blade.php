
@extends('layout')
@section('content')
<?php

use Illuminate\Support\Facades\URL;

$breadcrumbs = new Creitive\Breadcrumbs\Breadcrumbs;
$breadcrumbs->setCssClasses('breadcrumb');
//$breadcrumbs->setDivider('<i class="right chevron icon divider"></i>');
$breadcrumbs->addCrumb('Home', Url::to('home'));
$breadcrumbs->addCrumb('ประเภทสินค้า', Url::to('backend/type/index'));
$breadcrumbs->addCrumb($title, '/');

echo $breadcrumbs->render();
?>

<div class="panel panel-default">
    <div class="panel-heading"><h4><i class="fa fa-pencil"></i> {{$title}}</h4></div>
    <div class="panel-body">
        <label>ประเภทสินค้า</label>
        <input type="text" class="form-control" id="type_name" name="type_name" value="{{$model['type_name']}}"/>
        <label>เลือกรูปภาพ</label><br/>
        <div id="view-images">
            <img src="<?php echo Url('uploads/' . $model['image_name']) ?>" class="img-responsive img-polaroid thumbnail" style="height:150px;"/>
        </div>
        <button type="button" class="btn btn-warning outline" onclick="get_images()"><i class="fa fa-photo"></i> คลังรูปภาพ</button>
        <input type="hidden" class="form-control" id="images" name="images" value="{{$model['images']}}"/>
    </div>
    <div class="panel-footer" style=" text-align: right;">
        <button type="button" class="btn btn-success outline" onclick="update()"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
    </div>
</div>

<!-- Dialog Images -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="dialog-images">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div id="load_images"></div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Script -->
<script type="text/javascript">
    function get_images() {
        $("#dialog-images").modal();
        var url = "<?php echo url('backend/type/images') ?>";
        var data = {a: 1};
        $.post(url, data, function (result) {
            $("#load_images").html(result);
        });
    }

    function update() {
        var url = "<?php echo url('backend/type/saveupdate') ?>";
        var type_name = $("#type_name").val();
        var images = $("#images").val();
        var id = "<?php echo $model['id'] ?>";
        var data = {
            id: id,
            type_name: type_name,
            images: images
        };
        if (type_name == '' || images == '') {
            alert("กรอกข้อมลไม่ครบ");
            return false;
        }
        $.post(url, data, function (result) {
            window.location = "<?php echo Url::to('backend/type/index') ?>";
        });
    }
</script>
@stop