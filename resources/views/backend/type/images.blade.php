@if($images)
<div class="row">
    @foreach($images as $img)
    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
        <div class="container-card" style="height:150px;">
            <a href="{{Url('uploads/'.$img->image_name)}}" class="fancybox" rel="ligthbox">
                <div class="img-wrapper">
                    <img src="{{Url('uploads/'.$img->image_name)}}" class="img-responsive img-polaroid" style="height:150px;"/>
                </div>
            </a>
            <div id="btn-card">
                <button type="button" class="btn btn-primary btn-sm"
                        onclick="selectImg('<?php echo $img->id ?>','{{Url('uploads/'.$img->image_name)}}')">
                    เลือก</button>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endif

<script type="text/javascript">
    function selectImg(id, img) {
    var images = "<img src='" + img + "'class=\"img-responsive img-polaroid thumbnail\" style=\"height:150px;\"/>";
    $("#view-images").html(images);
    $("#images").val(id);
    $("#dialog-images").modal('hide');
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
    $(".fancybox").fancybox();
    });
</script>

