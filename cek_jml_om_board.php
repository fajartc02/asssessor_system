<?php



for($i=1; $i <= 1000; $i++){

$queryku = mysqli_query($con, "select count(fnote) as jml from t_finding_om where fgroup = '$fid_pd' and fid_score = '$i'");
while($queryku2=mysqli_fetch_array($queryku))
{
  
  ${"jml".$i} = $queryku2['jml'];
}

}


?>
