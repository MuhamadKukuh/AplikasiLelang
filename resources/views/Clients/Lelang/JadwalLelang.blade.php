@extends('Layouts.ClientLayouts.MainLayout')
@section('ClientContent')
<link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="{{ asset('/plugins/fullcalendar/main.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="/dist/css/adminlte.min.css">

<section class="content">
    <div class="container ">
        <div class="row my-5 gy-4 gx-5">
            <div class="col-12 col-sm-4">
                <div class="py-3 px-3 border-white shadow rounded-3" id="calendar"></div>
            </div>
            <div class="col-12 col-sm-8">
                <div class="section-header pb-0">
                    <h2>Lelang hari ini</h2>
                </div>
                <div class="row">
                    @forelse ($aucations as $aucation)
                    <div class="col-12 col-sm-4">
                        <div class="card rounded-3 border-white shadow">
                            <div class="card-body">
                                <a href="{{ asset($aucation->item->item_main_image) }}"
                                    data-gallery="portfolio-gallery-app" class="glightbox">
                                    <img src="{{ asset($aucation->item->item_main_image) }}" class="img-fluid"
                                        style="max-width: 100%; max-height:300px" alt="">
                                </a>
                                <h5 class="">
                                    <a href="{{ route('lelangDetail', $aucation->aucation_id) }}"
                                        style="color:rgb(0, 174, 23)"
                                        class=" fw-bold">{{ ucfirst($aucation->item->item_name) }}</a>
                                </h5>
                                <div class="card-content">
                                    <h6 class="">Rp
                                        {{ $aucation->final_price ? number_format($aucation->final_price, 0, '', '. ') : number_format($aucation->initial_price, 0, '', '. ') }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center">
                        <h4 class="py-3">Tidak ada barang lelang untuk hari ini</h4>
                    </div>
                    @endforelse
                    {{ $aucations->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<!-- fullCalendar 2.2.5 -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/fullcalendar/main.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>

<script>
    $(function () {
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;

        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            eventClick: function (info) {
                window.location = '../detail-barang/' + info.event.id
            },
            themeSystem: 'bootstrap',
            events: '/events',
        });

        calendar.render();

    })
</script>

@endsection