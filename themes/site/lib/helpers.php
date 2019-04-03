<?php
error_reporting(E_ALL ^ E_DEPRECATED);
    //==============Date functions========================
	function GetLongPrintableDate($dateVal)
	{
		return date("d/m/Y H:i:s", $dateVal);
	}

	function GetShortPrintableDate($dateVal)
	{
		return date("d/m/Y", $dateVal);
	}

	function GetFullDate($dateVal)
	{
		return date("l d F, Y", $dateVal); 
	}

	function GetTime($dateVal)
	{
		return date("H:i", $dateVal);
	}

	function GetTimeFull($dateVal)
	{
		return date("H:i A", $dateVal);
	}
	/*
	$strCalendarDate - dd/mm/yyyy

	Returns: yyyy-mm-dd hh:mm::ss
	*/
	function CalendarDateToMysqlDateTime($strCalendarDate, $bEndOfDay=false, $bIncludeTime=true)
	{
		//$nUnixDate = GetDateToUnix($strCalendarDate, $bEndOfDay, true); /*Return 0 if invalid date*/

		//return UnixToMysqlDateTime($nUnixDate, $bIncludeTime);
		
		if($strCalendarDate == "" || $strCalendarDate == "dd/mm/yyyy")
		{
			if($bIncludeTime)
				return "0000-00-00 00:00:00";
			else
				return "0000-00-00";
		}
		
		$arr1 = explode(" ", $strCalendarDate);
		$arr2 = explode("-", $arr1[0]);
		
		if(count($arr2) < 3)
		{
			if($bIncludeTime)
				return "0000-00-00 00:00:00";
			else
				return "0000-00-00";
		}
		
		$timeStr = " 00:00:00";
		if($bEndOfDay)
			$timeStr = " 23:59:59";
	
		if(isset($arr1[1]) && $arr1[1]!="")
			$timeStr = " " . $arr1[1];
	
		if($bIncludeTime)
			return $arr2[2]."-" . $arr2[1] . "-" . $arr2[0] . $timeStr;
		else
			return $arr2[2]."-" . $arr2[1] . "-" . $arr2[0];
	}

	//$date = dd/mm/yyyy
	function GetDateToUnix($date, $bEndOfDay=false, $bRetZeroOnErr=false){
		$result = ereg("^[0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]$",$date);
		if(!$result || $date == "dd/mm/yyyy")
		{
			if($bRetZeroOnErr)
				return 0;

			return time();
		}
		else{
			
			$date_arr = explode("/",$date);

			if(!$bEndOfDay)
				return mktime(0, 0, 0, $date_arr[1], $date_arr[0], $date_arr[2]);

			return mktime(23, 59, 59, $date_arr[1], $date_arr[0], $date_arr[2]);
		}
	}

	//$bIncludeTime - false - Returns: dd/mm/yyyy
	//$bIncludeTime - true  - Returns: dd/mm/yyyy hh:mm:ss
	function FormatMysqlDateTime($mysqlDate, $bIncludeTime=false)
	{
		if(empty($mysqlDate) || $mysqlDate == "")
			return "";

		$arrMysqlDate = explode(' ', $mysqlDate);
		$arrDate = explode('-', $arrMysqlDate[0]);
			
		$strRetDate = $arrDate[2] . "-" . $arrDate[1] . "-" . $arrDate[0];
		
		if($bIncludeTime)
			$strRetDate = $strRetDate . " " . $arrMysqlDate[1];

		return $strRetDate;
	}

	function FormatMysqlDateTimeReport($mysqlDate)
	{
		$unixDateTime = MysqlDateTimeToUnix($mysqlDate);
		return date("d-M-Y", $unixDateTime);
	}

	function MysqlDateTimeIsEmpty($mysqlDate)
	{
		if(empty($mysqlDate) || $mysqlDate == "")
			return true;

		if(trim($mysqlDate) == "0000-00-00" || trim($mysqlDate) == "0000-00-00 00:00:00")
			return true;

		$nUnixDateTime = MysqlDateTimeToUnix($mysqlDate);

		
		if($nUnixDateTime === FALSE || $nUnixDateTime == 0)
			return true;

		return false;
	}

	function MysqlDateTimeToArray($mysqlDate)
	{
		if(empty($mysqlDate) || $mysqlDate == "")
			return array();

		$arrTime = array();
		$arrMysqlDate = explode(' ', $mysqlDate);
		$arrDate = explode('-', $arrMysqlDate[0]);
		if(isset($arrMysqlDate[1]))
		{
			$arrTime = explode(":", $arrMysqlDate[1]);
		}
		
		$arrMysqlDatetime = array();
		$arrMysqlDatetime["dd"] = $arrDate[2];
		$arrMysqlDatetime["mm"] = $arrDate[1];
		$arrMysqlDatetime["yyyy"] = $arrDate[0];
		$arrMysqlDatetime["hh"] = (isset($arrTime[0]) && is_numeric($arrTime[0])) ? $arrTime[0] : 0;
		$arrMysqlDatetime["min"] = (isset($arrTime[1])) ? $arrTime[1] : 0;
		$arrMysqlDatetime["ss"] = (isset($arrTime[2])) ? $arrTime[2] : 0;

		return $arrMysqlDatetime;
	}

	/*
	$bIncludeTime - false - returns YYYY-mm-dd
	$bIncludeTime - true - returns YYYY-mm-dd hh:mm:ss
	*/
	function UnixToMysqlDateTime($unixDate, $bIncludeTime=true)
	{
		if($bIncludeTime)
		{
			if($unixDate <= 0)
				return "0000-00-00 00:00:00";

			return date("Y-m-d H:i:s", $unixDate);
		}

		if($unixDate <= 0)
			return "0000-00-00";

		//Return date only component
		return $strMyDateTime = date("Y-m-d", $unixDate);
	}

	function MysqlDateTimeToUnix($mysqlDate)
	{
		$arrMysqlDate = MysqlDateTimeToArray($mysqlDate);

		if(count($arrMysqlDate) <= 0)
			return 0;

		return mktime($arrMysqlDate["hh"], 
									$arrMysqlDate["min"], 
									$arrMysqlDate["ss"], 
									$arrMysqlDate["mm"], 
									$arrMysqlDate["dd"], 
									$arrMysqlDate["yyyy"]);
	}

	function GetTimespanInMinutesAsStr($unixTime)
	{
		$timeDifference = time() - $unixTime;
		$nTimeInMinutes =  (int)($timeDifference / 60);
			
		if($nTimeInMinutes == 0)
			$strTime = ($timeDifference % 60) . " seconds ago";
		else if($nTimeInMinutes == 1)
			$strTime =  "{$nTimeInMinutes} minute ago";
		else
			$strTime =  "{$nTimeInMinutes} minutes ago";

		return $strTime;
	}

?>