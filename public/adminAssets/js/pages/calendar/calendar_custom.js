
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
                            $('#eventBookingModal').modal('hide');
                            $('#calendar').fullCalendar('renderEvent', {
                                'title': title,
                                'start': start_date,
                                'end': end_date
                            });
                            Toast.fire({
                                icon: 'success',
                                title: 'Created successfully'
                            });
                        },
                        error: function(err) {
                            if (err.responseJSON.errors) {
                                $('#titleError').html(err.responseJSON.errors.title);
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
                    error: function(error) {
                    },
                });
            },
            eventClick: function(event) {
                var id = event.id;
                if (confirm('Are you sure you want to remove it?')) {
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
            selectAllow: function(event) {
                return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
            },
        });
        $("#eventBookingModal").on("hidden.bs.modal", function() {
            $('#saveEventBtn').unbind();
        });
    });
