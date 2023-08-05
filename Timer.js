(function ($) {
    $.fn.stopwatch = function () {
        var clock = this;
        timer = 0;
        phptime = 0;

        clock.addClass('stopwatch');

        clock.html('<div class="span12 well timer" style="text-align:center;"><span class="hr">00</span>:<span class="min">00</span>:<span class="sec">00</span></div>');
        clock.append('<input type="button" class="start btn btn-large btn-success" value="Start" style="margin-right:5px;" />');
        clock.append('<input type="button" class="stop btn btn-large btn-danger" value="Stop" style="margin-right:5px;" />');
        clock.append('<input type="button" class="quick btn btn-large btn-primary" value="Quick" style="margin-right:5px;" />');
        clock.append('<input type="button" class="reset btn btn-large btn-warning" value="Reset" />');

        h = clock.find('.hr');
        m = clock.find('.min');
        s = clock.find('.sec');
        var start = clock.find('.start');
        var stop = clock.find('.stop');
        var quick = clock.find('.quick');
        var reset = clock.find('.reset');
        stop.hide();
        quick.hide();

        start.bind('click', function () {
            timer = setInterval(do_time, 1000);
            quick.show();
            stop.show();
            start.hide();
            if(phptime === 0)
            	{
            		$.ajaxSetup({async:false});
            		$.get('currtime.php', function (data) {
                	$("#tstart").val(data);
                	phptime = data;
                	$.ajaxSetup({async:true});
            		});
            	}

            console.log("Timer Started at " + phptime);

        });

        quick.bind('click', function () {
            $('#EntryModal').modal('show');
        });

        stop.bind('click', function () {
            clearInterval(timer);
            quick.hide();
            stop.hide();
            start.show();

        });

        reset.bind('click', function () {
            clearInterval(timer);
            timer = 0;
            phptime = 0;
            h.html("00");
            m.html("00");
            s.html("00");
            stop.hide();
            start.show();
            quick.hide();
        });

        function do_time() {
            hour = parseFloat(h.text());
            minute = parseFloat(m.text());
            second = parseFloat(s.text());

            second++;

            if (second > 59) {
                second = 0;
                minute = minute + 1;
            }

            if (minute > 59) {
                minute = 0;
                hour = hour + 1;
            }

            // if(minute % 1 === 0 && second === 0)
            h.html("0".substring(hour >= 10) + hour);
            m.html("0".substring(minute >= 10) + minute);
            s.html("0".substring(second >= 10) + second);

            if (minute % 15 === 0 && second === 0) {
                $('#EntryModal').modal('show');
            }
        }
    };
})(jQuery);