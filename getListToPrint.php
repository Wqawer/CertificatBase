<?php
error_reporting(E_ALL);
ini_set('display_errors','on');
require_once("connGetDel.php");
require_once("fpdf181/fpdf.php");
error_reporting(E_ALL);
ini_set('display_errors','on');

$count = 5;
$p;
if(isset($_GET["p"])&&is_numeric($_GET["p"])){
$p = $_GET["p"];
}
else{
$p=1;
}
$offset = ($p-1)*$count;
if($offset<0)
    $offset=0;
$q = "SELECT Name,Surname,phone,pathAwers,pathRewers FROM `licenses` Limit $count Offset $offset";
 $result = $link->query($q);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { 
        echo $row["Name"]. " " . $row["Surname"]. " ".$row["phone"]."<br><img src='uploads/".$row['pathAwers']."' height='256px'> <img src='uploads/".$row['pathRewers']."' height='256px'><br>";
    }
} else {
    echo "0 results";
}
echo "<a href='printPDF'>Drukuj</a><a href='getListToPrint.php?p=".($p+1)."'>następna strona</a>";
?>
