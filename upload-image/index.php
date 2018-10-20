

     <html>
        <head>
            <meta charset="UTF-8">
            <title>AJAX image upload with, jQuery</title>
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function (e) {
                    $('#form_img').on('submit', function () {
                        event.preventDefault();
                        var file_data = $('#file').prop('files')[0];
                        var form_data = new FormData();
                        form_data.append('file', file_data);
                        $.ajax({
                            url: 'http://localhost/jquery/upload-image/upload.php', // point to server-side controller method
                            dataType: 'text', // what to expect back from the server
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            success: function (response) {
                                $('#msg').html(response); // display success response from the server
                            },
                            error: function (response) {
                                $('#msg').html(response); // display error response from the server
                            }
                        });
                    });
                });
            </script>
        </head>
        <body>
            <p id="msg"></p>


            <form id="form_img" action="#" method="GET" role="form" enctype="multipart/form-data">
                <input type="text" placeholder="Name" name="name">
                <input id="file" type="file" name="img" multiple>
                <button type="submit">Submit </button>
            </form>
        </body>
    </html>