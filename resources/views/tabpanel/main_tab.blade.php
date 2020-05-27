<div class="tab">
    <ul class="" role="tablist">
        <li role="presentation" class="active">
            <a href="#galery" aria-controls="galery" role="tab" data-toggle="tab">
                Graphic Designing
            </a>
        </li>
        <li role="presentation">
            <a href="#employee" aria-controls="employee" role="tab" data-toggle="tab">
                Mobile App Development
            </a>
        </li>
        <li role="presentation">
            <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
                Website Development
            </a>
        </li>
    </ul>
</div>
<div id="galery" class="tabcontent">
    @include('tabpanel.galery')
</div>

<div id="employee" class="tabcontent">
    @include('tabpanel.employee')
</div>

<div id="settings" class="tabcontent">
    @include('tabpanel.aboutus')
</div>


@push('styles')
    <style>
        body {font-family: Arial;}

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
@endpush
@push('scripts')

    <script>
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            tab = e.target;

            console.log(tab)
            $.get( "api/tabcontent/" + tab, function( data ) {
                console.log($( tab ).html( data ));
            });
        });
        // function openCity(evt, cityName) {
        //     console.log(cityName)
        //     var i, tabcontent, tablinks;
        //     tabcontent = document.getElementsByClassName("tabcontent");
        //     for (i = 0; i < tabcontent.length; i++) {
        //         tabcontent[i].style.display = "none";
        //     }
        //     tablinks = document.getElementsByClassName("tablinks");
        //     for (i = 0; i < tablinks.length; i++) {
        //         tablinks[i].className = tablinks[i].className.replace(" active", "");
        //     }
        //     document.getElementById(cityName).style.display = "block";
        //     evt.currentTarget.className += " active";
        //
        // }
    </script>

@endpush
