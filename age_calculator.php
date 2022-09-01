<?php 

function age_calculate($from_date,$to_date){

	// $from_date = "1988-11-14";
	// $to_date = "2022-09-01";
	
	// code by Nasir Uddin / www.nasirit.com

	$from_date = explode('-',$from_date);
	$to_date = explode('-',$to_date);

	$from_y = $from_date[0];
	$from_m = $from_date[1];
	$from_d = $from_date[2];

	$to_y = $to_date[0];
	$to_m = $to_date[1];
	$to_d = $to_date[2];

	if($to_d<$from_d){
		
		$to_m--;
		
		if($to_m==4 OR $to_m==6 OR $to_m==9 OR $to_m==11)
		$month_day = 30;
		elseif($from_y % 4 == 0 AND $to_m==2)
		$month_day = 29;
		elseif($to_m==2)
		$month_day = 28;
		else $month_day = 31;
		
		$to_d = $to_d + $month_day;
	}


	if($to_m<$from_m){
		$to_y--;
		$to_m = $to_m + 12;
	}

	$age_d = $to_d - $from_d;
	$age_m = $to_m - $from_m;
	$age_y = $to_y - $from_y;

	if($age_y==1) $age_y_s = 'Year';
	elseif($age_y>=0) $age_y_s = 'Years';

	if($age_m==1) $age_m_s = 'Month';
	elseif($age_m>=0) $age_m_s = 'Months';

	if($age_d==1) $age_d_s = 'Day';
	elseif($age_d>=0) $age_d_s = 'Days';

	if($age_y==0 AND $age_m==0 AND $age_d>=0) $age = "$age_d $age_d_s";
	elseif($age_y==0 AND $age_m>0) $age = "$age_m $age_m_s, $age_d $age_d_s";
	else $age = "$age_y $age_y_s, $age_m $age_m_s, $age_d $age_d_s";
	
	return $age;

}


$from_date = "1988-11-14";
$to_date = date('Y-m-d');

echo age_calculate($from_date,$to_date);

// Example of Output: 33 Years, 9 Months, 18 Days

?>
