<script type="text/javascript">
	$(function()
	{
		$('#clock').stopwatch();

		$('#task').focus(function() {
  			$(this).val('');
		});

		$("#distracted").css({ "opacity" : "0.5" });
		$("#focused").css({ "opacity" : "0.5" });

        $('#focused').bind('click', function () {
            $("#distracted").css({ "opacity" : "0.5" });
			$(this).css({ "opacity" : "1.0" });
			$("#hidefocus").val("1");
        });

		$('#distracted').bind('click', function () {
            $(this).css({ "opacity" : "1.0" });
			$("#focused").css({ "opacity" : "0.5" });
			$("#hidefocus").val("0");
        });

		$('#hidelog').click(function() {
		  $('#showlog').toggle('slow', function() {

		  });
		});



		$("#showlog").load("v.ShowRecentEntries.php");

		//Buttons as Radio from http://dan.doezema.com/2012/03/twitter-bootstrap-radio-button-form-inputs/
		$('div.btn-group[data-toggle-name=*]').each(function(){
		    var group   = $(this);
		    var form    = group.parents('form').eq(0);
		    var name    = group.attr('data-toggle-name');
		    var hidden  = $('input[name="' + name + '"]', form);
		    $('button', group).each(function(){
		      var button = $(this);
		      button.live('click', function(){
		          hidden.val($(this).val());
		      });
		      if(button.val() == hidden.val()) {
		        button.addClass('active');
		      }
		    });
		  });

		$('#taskform').submit(function()
		{
			// Stop Post
			event.preventDefault();

			// Post Record
			$.ajaxSetup({async:false});

			$.post("m.SetTask.php", $("#taskform").serialize());

			// Get Records
			$("#showlog").load("v.ShowRecentEntries.php");

			// Hide Entry Panel
			$('#EntryModal').modal('hide');

			h.html("00");
			m.html("00");
			s.html("00");
			hour = parseFloat(h.text());
			minute = parseFloat(m.text());
			second = parseFloat(s.text());

			// Reset Timestamp
			console.log("Timer Reset" + second);

			$.get('currtime.php', function(data)
			{
  				$("#tstart").val(data);
  				phptime = data;
  				console.log("New Task At " + phptime);
			});

			return false;
		});
	});
</script>