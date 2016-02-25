var base_path = $("#base_path").val();
var uploader = new plupload.Uploader({
    runtimes: 'html5,flash,silverlight,html4',
    browse_button: 'btn-select', // กำหนดปุ่มสำหรับเลือกรูปภาพ
    container: document.getElementById('container'), // กำหนด ID ที่ทำการครอบปุ่ม เลือกรูปภาพ และปุ่มสำหรับ upload
    url: base_path + '/backend/photo/action', // กำหนด path เพื่อส่งไปทำการอัพโหลดรูปภาพ
    flash_swf_url: '/assets/plupload/js/Moxie.swf',
    silverlight_xap_url: '/assets/plupload/js/Moxie.xap',
    filters: {
        max_file_size: '10mb',
        mime_types: [
            {title: "Image files", extensions: "jpg,gif,png"},
            {title: "Zip files", extensions: "zip"}
        ]
    },
    init: {
        PostInit: function () {
            document.getElementById('btn-upload').onclick = function () {
                uploader.start();
                return false;
            };
        },
        FilesAdded: function (up, files) {
            plupload.each(files, function (file) {
                preview.showImagePreview(file, file.id);
            });
            preview.removeImagePreview();
        },
        UploadProgress: function (up, file) {
            console.log('File ID : ' + file.id);
            document.getElementById('thumbs-' + file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
        },
        Error: function (up, err) {
            document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
        },
        UploadComplete: function (up, files) {
            display();
            $('#gallery .preview').html('');
            console.log('Upload Complete');
        }
    },
    //แนบค่าตัวแปร
    multipart_params: {
        _token: $("#_token").val(), 'btn-multiupload': ''
    }
});
// function สำหรับแสดงภาพก่อน upload
var preview = {
    showImagePreview: function (file, id) {
        var item = $('<li id="thumbs-' + id + '"><b></b><a href="' + id + '" class="del-preview btn btn-danger"><i class="fa fa-trash"></i></a></li>').prependTo('#gallery .preview');
        var image = $(new Image()).appendTo(item);
        var preloader = new mOxie.Image();
        preloader.onload = function () {
            preloader.downsize(100, 100);
            image.prop({"src": preloader.getAsDataURL(), 'id': id, 'class': 'img-preview'});
        };
        preloader.load(file.getSource());
    },
    removeImagePreview: function () {
        $('.del-preview').on('click', function (e) {
            e.preventDefault();
            var thumb = $('#thumbs-' + $(this).attr('href'));
            thumb.remove();
        });
    }
}

// Ajax แสดงผลรูปภาพทั้งหมด
var display = function () {
    $('.image-view').html('Loading...');
    $.ajax({url: base_path + '/backend/photo/preview',
        success: function (data) {
            $('.image-view').html(data);
        }
    });
}
display();
uploader.init();

