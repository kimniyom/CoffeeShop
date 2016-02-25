@if($images)
<div class="row">
    @foreach($images as $img)
    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
        <div class="container-card" style="height:200px;">
            <a href="{{Url('uploads/'.$img->image_name)}}" class="fancybox" rel="ligthbox">
                <div class="img-wrapper">
                    <img src="{{Url('uploads/'.$img->image_name)}}" class="img-responsive img-polaroid" style="height:200px;"/>
                </div>
            </a>
            <div id="btn-card">
                <button type="button" class="btn btn-danger btn-sm"
                        onclick="delete_images('<?php echo $img->id ?>')">
                    <i class="fa fa-trash"></i> </button>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endif

<script type="text/javascript">
    function delete_images(id) {
        var url = "<?php echo Url('backend/photo/delete') ?>";
        var data = {id: id};

        $.post(url, data, function (success) {
            display();
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".fancybox").fancybox();
    });
</script>

