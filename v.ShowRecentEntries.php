<?php

/**
 * Import the Time class from class.Time.php file.
 */
require_once("class.Time.php");

/**
 * Main execution of the script.
 *
 * This script connects to a SQLite database, performs a SELECT query,
 * and outputs a HTML table displaying specific data from each record.
 * If any exceptions occur, they are caught and their message is printed.
 */
try {
	/**
	 * Creates a new PDO instance representing a connection to a SQLite database.
	 * @var PDO
	 */
	$db = new PDO('sqlite:dbase.sqlite');

	/**
	 * Executes a SQL statement, returning a result set as a PDOStatement object,
	 * and stores the result in the variable.
	 * @var PDOStatement
	 */
	$result = $db->query('SELECT id,task,focus,tstart,tend FROM tasklog ORDER BY tstart DESC LIMIT  0, 30');

	// Start of the HTML output.
	echo '<div id="logs">
			<table class="table table-striped">
				<thead>
					<th></th>
					<th>Task</th>
					<th>Time</th>
				</thead>
				<tbody>';

	// Iterate over each row in the result set.
	foreach($result as $row) {
		$tstart = $row['tstart'];
		$tend = $row['tend'];

		/**
		 * Converts a timestamp to a date and stores in variable.
		 * @var array
		 */
		$tday = getdate($tstart);

		/**
		 * Gets the current date and time.
		 * @var array
		 */
		$now = getdate(time());

		// Calculate the difference in time.
		$tdiff = $tend - $tstart;

		/**
		 * Calculates the duration between two times.
		 * @var string
		 */
		$time = Time::duration($tstart, $tend);

		// Checks if 'focus' field is set and assigns star symbol accordingly.
		if ($row['focus'] == 1) {
			$star = '<span class="label label-warning" style="text-align:middle;vertical-align:middle;padding-left:7px;padding-right:7px;padding-top:2px;padding-bottom:5px;">:)</span>';
		} else {
			$star = '';
		}

		// If the current day is the same as the day the task started, print a table row with the task details.
		if ($now['weekday'] === $tday['weekday']) {
			print "<tr><td>$star</td><td><span style=\"vertical-align:middle;\">$row[task]</span></td><td><span style=\"vertical-align:middle;\">$time[o]</span></td></tr>";
		}
	}

	// End of the HTML output.
	echo '</tbody></table></div>';

	// Close the database connection.
	$db = NULL;
}

/**
 * Exception handling for PDO connection.
 * In case of a PDO exception, print the error message.
 */
catch(PDOException $e) {
	print 'Exception : '.$e->getMessage();
}
?>

