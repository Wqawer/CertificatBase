<?php
    define("MAX_SIZE", 5*1024*1024);
    $extensions= ["jpeg","jpg","png"];
?>
<body>
<form method="post" enctype='multipart/form-data'>
    <input type="text" name="Name">
    <input type="text" name="Surname">
    <input type="tel" name="tel">
    <input type="file" name="file[]" id="file" multiple>
    <input type="submit">
</form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $count = count($_FILES['file']['name']);
        if($count==2){
            for($i=0;$i<$count;$i++){
                if($_FILES['file']['size'][$i]<MAX_SIZE){
                    
                }
                else{
                    echo "<span style='color:red;'>Plik nr ".($i+1)." jest za duzy</span>";
                }
            }
        }
        else{
            echo "<span style='color:red;'>Musisz dodać 2 zdjęcia</span>";
        }
    }
    ?>
</body>