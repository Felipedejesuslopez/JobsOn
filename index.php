<?php
session_start();
if(isset($_SESSION["ID"])){
    $id = $_SESSION["ID"];
}else{
    ?>
    <script>
        window.location = "login/";
    </script>
    <?php
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobsOn</title>
</head>
<body>
    
</body>
</html>