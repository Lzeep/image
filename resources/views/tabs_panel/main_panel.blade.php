@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-5 pb-2">
                <div class="tab">
                    <button class="tablinks btn-active" data-id="1">About Us</button>
                    <button class="tablinks" data-id="2">Gallery</button>
                    <button class="tablinks" data-id="3">Employee</button>
                </div>

                <div id="main">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid amet aperiam at beatae
                        consequatur dolor error et exercitationem fugit illum labore modi nemo numquam, pariatur quas
                        quisquam repellat totam voluptas?</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
@endpush

@push('scripts')
    <script>
        $('.tablinks').click(function (e) {
            var btn = $(e.currentTarget);
            if(btn.hasClass('btn-active') == false){
              $('.tablinks').removeClass('btn-active');
              btn.addClass('btn-active');
                $.ajax({
                    url: '{{ route('change_tab') }}',
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": btn.data('id'),

                    },
                    success: data => {
                        $('#main').html(data.view);
                    },
                    error: () => {
                        alert('error');
                    }
                });
            }
        })
    </script>


@endpush

