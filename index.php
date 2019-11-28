<html>
    <body>
        <form method="post" enctype='multipart/form-data'>
            <input type="text" name="Name">
            <input type="text" name="Surname">
            <input type="tel" name="tel">
            <input type="file" name="upfile" id="file">
            <input type="file" name="upfile2" id="file">
            <input type="submit">
        </form>
    </body>
</html>
<?php
require("connInsert.php");
function getGUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}
if(isset($_POST["Name"])&&$_POST["Name"]!=""&&isset($_POST["Surname"])&&$_POST["Surname"]!=""&&isset($_POST["tel"])&&$_POST["tel"]!=""){
    $name = filter_var($_POST["Name"], FILTER_SANITIZE_STRING);
    $surname = filter_var($_POST["Surname"], FILTER_SANITIZE_STRING);
    $tel = filter_var($_POST["tel"], FILTER_SANITIZE_STRING);
    //header('Content-Type: text/plain; charset=utf-8');
    $uploads= array(0=>"upfile",1=>"upfile2");
    $awersName;
    $rewersName;
 if(!validateFileUpload($_FILES["upfile"],$awersName)||!validateFileUpload($_FILES["upfile2"],$rewersName)){
        echo "Złe Zdjęcia";
        exit;
    }
        
    $link = conn();
    $q = "Insert into licenses  (Name,Surname, Phone, pathAwers, pathRewers) values ('$name', '$surname' ,'$tel' ,'$awersName', '$rewersName')";
    $link->query($q);
}

function validateFileUpload($file,&$name){
        try {

            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if (
                !isset($file['error']) ||
                is_array($file['error'])
            ) {
                throw new RuntimeException('Invalid parameters.');
            }

            // Check $file['error'] value.
            switch ($file['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }

            // You should also check filesize here.
            if ($file['size'] > 10000000) {
                throw new RuntimeException('Exceeded filesize limit.');
            }

            // DO NOT TRUST $file['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                $finfo->file($file['tmp_name']),
                array(
                    'jpeg' => 'image/jpeg',
                    'jpg' => 'image/jpg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                ),
                true
            )) {
                throw new RuntimeException('Invalid file format.');
            }

            // You should name it uniquely.
            // DO NOT USE $file['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            $guid = getGUID();
                $name = $guid.".$ext";
            if (!move_uploaded_file(
                $file['tmp_name'],
                sprintf('./uploads/'.$guid.".$ext"
                )
            )) {
                throw new RuntimeException('Failed to move uploaded file.');
            }

            return true;

        } catch (RuntimeException $e) {

            return $e->getMessage();

        }
    
}
?>