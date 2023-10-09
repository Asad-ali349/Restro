<?php
include_once "db/conn.php";
$response=[];
$years=mysqli_query($conn,"SELECT YEAR(`created_at`), SUM(`total_amount`),SUM(`discounted_amount`), (total_amount-discounted_amount) as earn FROM `orders` GROUP BY YEAR(`created_at`) ORDER BY YEAR(`created_at`) ASC");
if (mysqli_num_rows($years)>0) {
	$year=[];
	$earn=[];
	$count=0;
	while($data=mysqli_fetch_array($years)){
		$year[$count]=$data['YEAR(`created_at`)'];
		$total=(float)$data['SUM(`total_amount`)'];
		$dis=(float)$data['SUM(`discounted_amount`)'];
		$earn[$count]=$total-$dis;
		$count++;
	}
	$response['year']=$year;
	$response['earn']=$earn;
	
}else{
	$response['error']="nothing";
	header('content-Type:application/json');
	echo json_encode($response);
}

$y=date("Y");

$months=mysqli_query($conn,"SELECT MONTH(`created_at`), SUM(`total_amount`),SUM(`discounted_amount`), (total_amount-discounted_amount) as earn FROM `orders` WHERE YEAR(`created_at`)='$y' GROUP BY MONTH(`created_at`) ORDER BY MONTH(`created_at`) ASC");
if (mysqli_num_rows($months)>0) {
	$month=[];
	$earn=[];
	$count=0;
	while($data=mysqli_fetch_array($months)){
		$monthNum  = $data['MONTH(`created_at`)'];
		$dateObj   = DateTime::createFromFormat('!m', $monthNum);
		$monthName = $dateObj->format('F'); // March
		$month[$count]=$monthName;

		$total=(float)$data['SUM(`total_amount`)'];
		$dis=(float)$data['SUM(`discounted_amount`)'];
		$earn[$count]=$total-$dis;
		$count++;
	}
	$response['month']=$month;
	$response['monthly_earn']=$earn;
	
}else{
	$response['error']="nothing";
	header('content-Type:application/json');
	echo json_encode($response);
}
$s=date("m");

$daily=mysqli_query($conn,"SELECT DATE(`created_at`), SUM(`total_amount`),SUM(`discounted_amount`), (total_amount-discounted_amount) as earn FROM `orders` WHERE MONTH(`created_at`)='$s' AND YEAR(`created_at`)='$y' GROUP BY DATE(`created_at`) ORDER BY DATE(`created_at`) ASC");
echo $s."\n";
echo $y;
if (mysqli_num_rows($daily)>0) {
	$date=[];
	$earn=[];
	$count=0;
	while($data=mysqli_fetch_array($daily)){
		$date[$count]=$data['DATE(`created_at`)'];
		$total=(float)$data['SUM(`total_amount`)'];
		$dis=(float)$data['SUM(`discounted_amount`)'];
		$earn[$count]=$total-$dis;
		$count++;
	}
	$response['date']=$month;
	$response['daily_earn']=$earn;
	header('content-Type:application/json');
	echo json_encode($response);
}else{
	$response['error']="nothing";
	header('content-Type:application/json');
	echo json_encode($response);
}
?>