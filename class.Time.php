<?php

class Time
{
	static function duration($start,$end=null)
	{
		$end = is_null($end) ? time() : $end;

		$seconds = $end - $start;

		$fuzzTime = array();
		$fuzzTime['d'] = floor($seconds/60/60/24);
		$fuzzTime['h'] = $seconds/60/60%24;
		$fuzzTime['m'] = $seconds/60%60;
		$fuzzTime['s'] = $seconds%60;
		$fuzzTime['o'] = "Its Fuzzy";

		//SECONDS
		if($fuzzTime['s']>0)
		{
			if ($fuzzTime['m']>0)
			{
				if($fuzzTime['s'] >0 && $fuzzTime['s'] <20)
				{ $fuzzTime['s'] = 0; }
				if($fuzzTime['s'] >=20 && $fuzzTime['s'] <40)
				{ $fuzzTime['s'] = 30; }
				if($fuzzTime['s'] >=40 && $fuzzTime['s'] <50)
				{ $fuzzTime['s'] = 45; }
				if($fuzzTime['s'] >=50 && $fuzzTime['s'] <=59)
				{
					$fuzzTime['s'] = $fuzzTime['s']++;
				}
			}
		}

		//MINUTES
		if($fuzzTime['m']>0)
		{
			// Trigger if we have some hours.
			if ($fuzzTime['h']>0)
			{
				if($fuzzTime['m']>=25 && $fuzzTime['m']<40)
				{ $fuzzTime['m'] = 30; }
				if($fuzzTime['m']>=40 && $fuzzTime['m']<55)
				{ $fuzzTime['m'] = 45; }
				if($fuzzTime['m']>=55 && $fuzzTime['m'] <=59)
				{
					$fuzzTime['h'] = $fuzzTime['h']++;
					$fuzzTime['m'] = 0;
				}
			} else
			{
				if($fuzzTime['m']>=15 && $fuzzTime['m'] <20)
				{ $fuzzTime['m'] = 15; }
				if($fuzzTime['m']>=20 && $fuzzTime['m'] <25)
				{ $fuzzTime['m'] = 20; }
				if($fuzzTime['m']>=25 && $fuzzTime['m'] <30)
				{ $fuzzTime['m'] = 25; }
				if($fuzzTime['m']>=30 && $fuzzTime['m'] <35)
				{ $fuzzTime['m'] = 30; }
				if($fuzzTime['m']>=35 && $fuzzTime['m']<40)
				{ $fuzzTime['m'] = 35; }
				if($fuzzTime['m']>=40 && $fuzzTime['m']<45)
				{ $fuzzTime['m'] = 40; }
				if($fuzzTime['m']>=45 && $fuzzTime['m'] <50)
				{ $fuzzTime['m'] = 45; }
				if($fuzzTime['m']>=50 && $fuzzTime['m']<55)
				{ $fuzzTime['m'] = 50; }
				if($fuzzTime['m']>=55 && $fuzzTime['m'] <59)
				{
					$fuzzTime['h'] = $fuzzTime['h']++;
					$fuzzTime['m'] = 0;
				}
			}
		}

		// HOURS
		if($fuzzTime['h']>0)
		{
			if ($fuzzTime['h']>11 || $fuzzTime['d']>0 && $fuzzTime['m']>15)
			{
				$fuzzTime['h'] = $fuzzTime['h']++;
			}
			else
			{
				$fuzzTime['m'] = 0;
				$fuzzTime['s'] = 0;
			}
		}

		//Days
		if($fuzzTime['d']>0)
		{
			$fuzzTime['m'] = 0;
			$fuzzTime['s'] = 0;

			if ($fuzzTime['h'] > 8)
			{ $fuzzTime['d'] = $fuzzTime['d']++; $fuzzTime['h'] = 0;}
		}


		// Fuzzy English Days Gone By
		if ($fuzzTime['d']>0)
		{
			if ($fuzzTime['d']>1){
			$fuzzTime['o'] = $fuzzTime['d'] . 'Days ';
			} else
			{ $fuzzTime['o'] = $fuzzTime['d'] . 'Day '; }
			if ($fuzzTime['h'] > 0)
			{
				$fuzzTime['o'] .= $fuzzTime['h'] . ' Hrs';
			}
		}
		// Hours in the Sand
		elseif ($fuzzTime['h']>0)
		{
			$fuzzTime['o'] = $fuzzTime['h'];

			if ($fuzzTime['m']>20 && $fuzzTime['m']<40)
				{
					$fuzzTime['o'] .= "1/2";
				}
			elseif ($fuzzTime['m']>0)
				{
					$fuzzTime['o'] .= ":".str_pad($fuzzTime['m'],2,"0");
				}

			if ($fuzzTime['h']>1)
				{
					$fuzzTime['o'] .= " hours ";
				}
				else { $fuzzTime['o'] .= " hours "; }
		}
		elseif ($fuzzTime['m']>0)
		{
			$fuzzTime['o'] = $fuzzTime['m'] . "m";
		}
		elseif ($fuzzTime['s']>0)
		{
			$fuzzTime['o'] = " <1m";
		}
		else
		{
			$fuzzTime['o'] = "ERR";
		}


		return $fuzzTime;
	}
}