<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="js/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">


    //bắt xự kiện click button submit form
    /*$("#add_user_btn").click(function () {
    //tạo 1 mảng chứa data
        var array = {
            //tạo 1 key chứa giá trị data
           "username": $("input[name=uname]").val(),
            "firstname" : $("input[name=fname]").val(),
            "lastname": $("input[name=lname]").val(),
            "password" :  $("input[name=pword]").val(),
            "email" :$("input[name=email]").val(),
    }

           $.ajax({
                method:"POST",
               //chuyển đến url xử lý dữ liệu
                url: "{{--{{route('register')}}--}}",
           //chuyền mảng đã tạo vào data
           data: {
                data:array,
           },
            success: function (data) {
                console.log('Submission was successful.');
                console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });

    $("input[name=submit]").click(function(){
        //ajax cho post form
        var formData = new FormData($('form')[0]);
        $.ajax({
           type: "POST",
         url: "{{--{{route('user.create')}}--}}" ,
            processData: false,
            contentType: false,
            data: formData,
            datatype: "json",
            success: function (data, textStatus, jqXHR) {
                console.log('Submission was successful.');
                console.log(data);
            },
            error: function (data, textStatus, jqXHR) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    })*/
    let editor_config = {
        path_absolute : "/",
        selector: "textarea.tinymce_editor_init",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            let cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);

</script>
