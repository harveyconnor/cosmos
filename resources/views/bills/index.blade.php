@extends('layouts.app_layout')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="panel panel-default m-b-0">
                <div class="panel-heading">
                    <h3 class="m-y-0">Calendar</h3>
                </div>
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="panel panel-default m-b-0">
                <div class="panel-heading">
                    <h3 class="m-y-0">Draggable Events</h3>
                </div>
                <div class="panel-body">
                    <div id="external-events">
                        <div class="fc-event mb-0-5">My Event 1</div>
                        <div class="fc-event mb-0-5">My Event 2</div>
                        <div class="fc-event mb-0-5">My Event 3</div>
                        <div class="fc-event mb-0-5">My Event 4</div>
                        <div class="fc-event mb-0-5">My Event 5</div>
                        <label class="custom-control custom-control-primary custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="drop-remove">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-label">remove after drop</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra_scripts')
    <script type="application/javascript">
        'use strict';

        (function ($) {
            'use strict';

            // initialize the external event

            $('#external-events .fc-event').each(function () {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });
            });

            // initialize the calendar
            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function drop() {
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                navLinks: true,
                events: [{
                    title: 'All Day Event',
                    start: YM + '-01'
                }, {
                    title: 'Long Event',
                    start: YM + '-07',
                    end: YM + '-10'
                }, {
                    id: 999,
                    title: 'Repeating Event',
                    start: YM + '-09T16:00:00'
                }, {
                    id: 999,
                    title: 'Repeating Event',
                    start: YM + '-16T16:00:00'
                }, {
                    title: 'Conference',
                    start: YESTERDAY,
                    end: TOMORROW
                }, {
                    title: 'Meeting',
                    start: TODAY + 'T10:30:00',
                    end: TODAY + 'T11:30:00'
                }, {
                    title: 'Lunch',
                    start: TODAY + 'T12:00:00'
                }, {
                    title: 'Meeting',
                    start: TODAY + 'T14:30:00'
                }, {
                    title: 'Happy Hour',
                    start: TODAY + 'T17:30:00'
                }, {
                    title: 'Dinner',
                    start: TODAY + 'T20:00:00'
                }, {
                    title: 'Birthday Party',
                    start: TOMORROW + 'T07:00:00'
                }, {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: YM + '-28'
                }]
            });
        })(jQuery);

    </script>
@endsection