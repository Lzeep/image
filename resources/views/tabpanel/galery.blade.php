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

@push('scripts')
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
@endpush
