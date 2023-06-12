<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>Admin :: Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css" />
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/charts-c3/plugin.css" />

    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/morrisjs/morris.min.css" />

    {{-- select2 --}}
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/select2/select2.css" />
    {{-- select2 --}}

    {{-- dropify --}}
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/dropify/css/dropify.min.css">
    {{-- dropify --}}

    {{-- calendar --}}
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/plugins/bootstrap-select/css/bootstrap-select.css" />
    {{-- calendar --}}

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('adminAssets') }}/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="theme-blush">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('adminAssets') }}/images/loader.svg"
                    width="48" height="48" alt="Aero"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Main Search -->
    <div id="search">
        <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
        <form>
            <input type="search" value="" placeholder="Search..." />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <!-- Right Icon menu Sidebar -->
    @include('backend.include.right-sidebar')

    <!-- Left Sidebar -->
    @include('backend.include.left-sidebar')

    <!-- Right Sidebar -->
    {{-- that part move to right-sidebar  --}}

    <!-- Main Content -->

    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Dashboard</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> HRM</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container py-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="calendar">

                        </div>
                    </div>
                </div>
            </div>

            {{-- event booking modal --}}

            <!-- Modal -->
            <div class="modal fade" id="eventBookingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Holiday</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control mb-3" name="title" id="title"
                                placeholder="Event Title">
                            <span id="titleError" class="text-danger mb-3"></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="saveEventBtn" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end of event booking modal --}}
            <script>
                $(document).ready(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    var booking = @json($events);
                    $('#calendar').fullCalendar({
                        header: {
                            left: 'prev, next today',
                            center: 'title',
                            right: 'month, agendaWeek, agendaDay',
                        },
                        events: booking,
                        selectable: true,
                        selectHelper: true,
                        defaultView: 'month',
                        select: function(start, end, allDays) {
                            $('#title').val(''); // Clear the title input field
                            $('#eventBookingModal').modal('show');

                            $('#saveEventBtn').click(function() {
                                var title = $('#title').val();
                                // var start_date = moment(start).format('MM-DD-YYYY');
                                // var end_date = moment(end).format('MM-DD-YYYY');

                                var start_date = moment(start).format('YYYY-MM-DD');
                                var end_date = moment(end).format('YYYY-MM-DD');

                                $.ajax({
                                    url: "{{ route('admin.event.store') }}",
                                    type: "POST",
                                    dataType: 'json',
                                    data: {
                                        title,
                                        start_date,
                                        end_date
                                    },
                                    success: function(response) {
                                        $('#eventBookingModal').modal('hide'),
                                            $('#calendar').fullCalendar('renderEvent', {
                                                'title': title,
                                                'start': start_date,
                                                'end': end_date
                                            })
                                        Toast.fire({
                                            icon: 'success',
                                            title: 'Created successfully'
                                        });
                                    },
                                    error: function(err) {
                                        if (err.responseJSON.errors) {
                                            $('#titleError').html(err.responseJSON.errors
                                                .title);
                                        }
                                    },
                                });
                            });
                        },
                        editable: true,
                        eventDrop: function(event) {
                            var id = event.id;
                            var start_date = moment(event.start).format('YYYY-MM-DD');
                            var end_date = moment(event.end).format('YYYY-MM-DD');
                            $.ajax({
                                url: "{{ route('admin.event.update', '') }}" + '/' + id,
                                type: "PATCH",
                                dataType: 'json',
                                data: {
                                    start_date,
                                    end_date
                                },
                                success: function(response) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Updated successfully'
                                    });
                                },
                                error: function(error) {},
                            });
                        },
                        eventClick: function(event) {
                            var id = event.id;
                            if (confirm('Are you sure want to remove it')) {
                                $.ajax({
                                    url: "{{ route('admin.event.destroy', '') }}" + '/' + id,
                                    type: "DELETE",
                                    dataType: 'json',
                                    success: function(response) {
                                        $('#calendar').fullCalendar('removeEvents', response);
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'Deleted successfully'
                                        });
                                    },
                                    error: function(error) {
                                        console.log(error)
                                    },
                                });
                            }
                        },
                    });
                    $("#eventBookingModal").on("hidden.bs.modal", function() {
                        $('#saveEventBtn').unbind();
                    });
                });
            </script>

        </div>
    </section>


    <!-- Jquery Core Js -->
    <script src="{{ asset('adminAssets') }}/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{ asset('adminAssets') }}/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

    <script src="{{ asset('adminAssets') }}/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
    <script src="{{ asset('adminAssets') }}/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
    <script src="{{ asset('adminAssets') }}/bundles/c3.bundle.js"></script>

    <script src="{{ asset('adminAssets') }}/bundles/mainscripts.bundle.js"></script>
    <script src="{{ asset('adminAssets') }}/js/pages/index.js"></script>
    <script src="{{ asset('adminAssets') }}/plugins/select2/select2.min.js"></script> <!-- Select2 Js -->
    <script src="{{ asset('adminAssets') }}/js/pages/forms/advanced-form-elements.js"></script>

    {{-- dropify --}}
    <script src="{{ asset('adminAssets') }}/plugins/dropify/js/dropify.min.js"></script>
    <script src="{{ asset('adminAssets') }}/js/pages/forms/dropify.js"></script>
    {{-- dropify --}}

    {{-- calendar --}}
    <script src="{{ asset('adminAssets') }}/bundles/fullcalendarscripts.bundle.js"></script>
    <script src="{{ asset('adminAssets') }}/js/pages/calendar.calendar_custom.js"></script>
    {{-- calendar --}}
</body>

</html>
