<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>
<body>
<div class="flex-center position-ref full-height">

    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif


</div>
<div class="container">
    <div class="alert" id="message" style="display: none"></div>
    <form method="post" id="upload_form" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <table class="table">
                <tr>
                    <td width="40%" align="right"><label>Select File for Upload</label></td>
                    <td width="30"><input type="file" name="image" id="select_file"/></td>
                    <td width="30%" align="left"><input type="submit" name="upload" id="upload"
                                                        class="btn btn-primary" value="Upload"></td>
                </tr>
                <tr>
                    <td width="40%" align="right"></td>
                    <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                    <td width="30%" align="left"></td>
                </tr>
            </table>
        </div>
    </form>
    <form action="{{route('simple.add')}}" method="post" enctype="multipart/form-data">
        @csrf
        <table class="table">
            <tr>
                <td width="40%" align="right"><label for="photo_input">Фотография</label></td>
                <td width="30"><input id="photo_input" type="file" class="form-control" name="image" accept="image/jpeg, image/png"
                                                                                               required></td>
                <td width="30%" align="left"><button type="submit" class="btn btn-primary">Add Image</button> </td>
            </tr>
        </table>

    </form>

    <div id="galere" class="row">
        @foreach($images as $image)
            <div class="col-3 mt-2">
                <img
                    src="{{ asset('storage/large/'. $image->image) }}"
                    class='img-fluid ' alt="Tonel">
            </div>
        @endforeach
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
<script>
    $(document).ready(function () {

        $('#upload_form').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('ajaxupload.action') }}",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#message').css('display', 'block');
                    $('#message').html(data.message);
                    $('#message').addClass(data.class_name);
                    $('#galere').append(data.addition_html);
                }
            })
        });

    });
</script>

</body>

</html>
