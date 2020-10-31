<?php



for($i=1; $i <= 1000; $i++){

$queryku = mysqli_query($con, "select count(fnote) as jml from t_finding_4s where fid_schedule in ($fidx,$fid_pd,$fid_c) and fid_score = '$i'");
while($queryku2=mysqli_fetch_array($queryku))
{
  
  ${"jml".$i} = $queryku2['jml'];
}

}




























?>
