<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Search Page Part B</title>
</head>

<body>
<form action = "resultpb.php" method = "GET">


<?php
require_once('db.php');
mysql_connect(DB_HOST, DB_USER, DB_PW);
$dbcon = mysql_connect(DB_HOST, DB_USER, DB_PW);

if(!$dbcon)
{
//echo 'Could not connect to mysql on ' . DB_HOST . "\n";
//exit;
die('Can not accesse '.mysqlerror());
}
echo 'Connected to mysql on ' . DB_HOST . "\n";
mysql_select_db("winestore", $dbcon);

//mysql_close($dbcon);
?>





<br />
<br />
<br />
<li>
<span>Please Enter wine name:</span></t>
<input type = "text" name = "winename" id = "winename" />
<br />
<br />
<br />
</li>
<li><span>Enter winery name:</span>
<input type = "text" name = "wineryname" id = "wineryname" />
<br />
<br />
<br />
</li>


<?php
require_once('db.php');
mysql_connect(DB_HOST, DB_USER, DB_PW);
$dbcon = mysql_connect(DB_HOST, DB_USER, DB_PW);

if(!$dbcon)
{
//echo 'Could not connect to mysql on ' . DB_HOST . "\n";
//exit;
die('Can not accesse '.mysqlerror());
}
//echo 'Connected to mysql on ' . DB_HOST . "\n";
mysql_select_db("winestore", $dbcon);


$query_region = "select region_name from region ";
$result_region = mysql_query($query_region, $dbcon);
echo "<li>Select a region ";
echo "<select name = 'region' id  = 'region'>";
while ($option = mysql_fetch_row($result_region)){
	for($j = 0; $j < mysql_num_fields($result_region); $j++){
		echo "<option value = '$option[$j]'>$option[$j]</option>";
	}
}


?>
</li>
</select>
<br />
<br />
<br />


<li>Select a grape
<select name = 'grape' id  = 'grape'>
<?php
     

$query_grape = "select variety from grape_variety";

$result_grape = mysql_query($query_grape, $dbcon);

while ($option = mysql_fetch_row($result_grape)){
	for($k = 0; $k < mysql_num_fields($result_grape); $k++){
		echo "<option value = '$option[$k]'>$option[$k]</option>";
	}
}

?>
</li>
</select>
<br />
<br />
<br />





<li>Please Select start years
<select name = 'yearst' id  = 'yearst'>
<?php
$query_year = "select distinct year from wine order by year asc;";
$result_year = mysql_query($query_year, $dbcon);

while ($year = mysql_fetch_row($result_year)){
	for($k = 0; $k < mysql_num_fields($result_year); $k++){
		echo "<option value = '$year[$k]'>$year[$k]</option>";
	}
}

?>


</li>
</select>
<br />
<br />
<li>Please Select End years
<select name = 'yeared' id  = 'yeared'>

<?php

$query_year = "select distinct year from wine order by year asc;";
$result_year = mysql_query($query_year, $dbcon);

while ($year = mysql_fetch_row($result_year)){
	for($k1 = 0; $k1 < mysql_num_fields($result_year); $k1++){
		echo "<option value = '$year[$k1]'>$year[$k1]</option>";
	}
}



?>
</li>
</select>
<br />
<br />
<br />




<li><span>Minimum number of wines in stock</span>
<input type = "text" name = "minstock" id = "minstock" value = 0 />
<br />
<br />
<br />
</li>
<li>
<span>Minimum number of wines ordered</span>
<input type = "text" name = "minorder" id = "minorder" value = 0 />
<br />
<br />
<br />
</li>
<li>
<span>Enter minimum cost:</span>
<input type = "text" name = "mincost" id ="mincost" value = 0 />
<br />
<br />
<br />
</li>
<li>
<span>Enter maximum cost:</span>
<input type= "text" name = "maxcost" id="maxcost" value = 0 />
<br />
<br />
<br />
</li>

<input type = "submit" name = "submit" id = "submit" value = "Search" />


<br />
<br />
<br />

<?php
mysql_close($dbcon);
?>

</form>
</body>
</html>