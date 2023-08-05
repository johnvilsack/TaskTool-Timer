<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style><?php include("bootstrap/css/bootstrap.min.css"); ?>body{margin-top:20px}.container{margin-left:auto;margin-right:auto}.timer{font-size:48px;font-weight:700}.modal{position:fixed;top:3%;right:3%;left:3%;bottom:3%;width:auto;margin:0}.modal-body{overflow-y:auto;-webkit-overflow-scrolling:touch;padding:15px}@media max-width 480px{.page-header h1 small{display:block;line-height:22px}input[type=checkbox],input[type=radio],input[type=text],{height:125%;font-size:125%;vertical-align:middle;line-height:22px}.form-horizontal .control-group > label{float:none;width:auto;padding-top:0;text-align:left}.form-horizontal .controls{margin-left:0}.form-horizontal .control-list{padding-top:0}.form-horizontal .form-actions{padding-right:12px;padding-left:12px}.modal{position:absolute;top:12px;right:12px;left:12px;width:auto;margin:0}.modal.fade.in{top:auto}.modal-header .close{margin:-12px;padding:12px}.input-large{width:100%}}</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12" style="text-align:center;margin-bottom:22px;">
				<div id="clock"></div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12" style="text-align:right;">
				<button id="hidelog" type="button" class="btn btn-mini" data-toggle="button">+</button>
				<div id="showlog" class="well" style="text-align:center;"></div>
			</div>
	</div>

	<!-- Hidden Modal -->
	<div class="modal hide" id="EntryModal">
		<div class="modal-header">
			<button class="close" data-dismiss="modal">X</button>
			<h3>What Have You Been Doing?</h3>
		</div>

		<form id="taskform" class="well form-inline" method="post" action="">
			<div class="modal-body">
				<center>
					<input type="text" id="task" class="input-large" name="task" placeholder="Enter Task/Distraction"><br>

						<hr>
						<div class="btn-group" data-toggle-name="focus" data-toggle="buttons-radio">
  							<button id="focused" type="button" value="1" class="btn btn-success btn-large" data-toggle="button">Focused</button>
  							<button id="distracted" type="button" value="0" class="btn btn-danger btn-large" data-toggle="button">Distracted</button>
						</div>

						<input id="hidefocus" type="hidden" name="focus" value="1" />
					<input type="hidden" id="tstart" name="tstart" value="">
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Save and Continue</button>
					</center>
			</div>
		</form>


	</div>
	<script>
		<?php
			include("bootstrap/js/jquery.js");
			include("bootstrap/js/bootstrap.js");
			include("Timer.js");
		?>
	</script>

	<?php include ("c.Timer.php"); ?>
</body>
</html>