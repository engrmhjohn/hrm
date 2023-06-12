<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>Admin :: Home</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

</head>

<body class="theme-blush">

    <div class="container">
        @yield('content')
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                                        'title': response.title,
                                        'start': response.start_date,
                                        'end': response.end_date
                                    })
                                swal("Good job!", "Event Added!", "success");
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
                            swal("Good job!", "Event Updated!", "success");
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
                                swal("Good job!", "Event Deleted!", "success");
                            },
                            error: function(error) {
                                console.log(error)
                            },
                        });
                    }
                },
                selectAllow: function(event) {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1,
                        'second').utcOffset(false), 'day');
                },

            });
            $("#eventBookingModal").on("hidden.bs.modal", function() {
                $('#saveEventBtn').unbind();
            });

            // $('.fc-event').css('font-size', '13px');
            // $('.fc-event').css('width', '20px');
            // $('.fc-event').css('border-radius', '50%');
        });
    </script>
</body>

</html>
