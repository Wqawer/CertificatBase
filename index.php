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
        echo "got Post";
        $count = count($_FILES['file']['name']);
        echo $count." Files";
        if($count>0){
            for($i=0;$i<$count;$i++){
                //check MIME
                //
            }
        }
        
    }
    ?>
</body>