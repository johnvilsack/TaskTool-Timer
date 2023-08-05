<?php

$task =  $_POST['task'];
$tstart = $_POST['tstart'];
$tend = time();
$focus = $_POST['focus'];

try
	{
		$query = 'INSERT INTO tasklog (id,task,focus,tstart,tend) VALUES (NULL,"'.$task.'", "'.$focus.'", "'.$tstart.'", "'.$tend.'")';
		$db = new PDO('sqlite:dbase.sqlite');
		$db->exec($query);
		$db = NULL;
	}

catch(PDOException $e)
	{
		print 'Exception : '.$e->getMessage();
	}