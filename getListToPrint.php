<?php
require_once("connGetDel.php");
$link = conn();
$count = 5;
$p;
//echo isset($_GET["p"]);
echo is_int($_GET["p"]);
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
echo "<button onclick='window.print()'>Drukuj</button><a href='getListToPrint.php?p=".($p+1)."'>następna strona</a>";
?>
