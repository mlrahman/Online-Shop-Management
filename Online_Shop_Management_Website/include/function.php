<?php

function month_convert($temp_month)
{
	$temp_month=$temp_month[3].$temp_month[4].$temp_month[5];
	return $temp_month;
}


function year_convert($temp_year)
{
	$temp_year=$temp_year[7].$temp_year[8].$temp_year[9].$temp_year[10];
	return $temp_year;
}


function date_convert($temp_date)
{
	$temp_date=$temp_date[0].$temp_date[1];
	return $temp_date;
}



?>