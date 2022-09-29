<?php


include('protect.php')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Obrigado por acessar senhor(a) <?php echo $_SESSION['id']?></h1>

    
        
    <div>
        <label for=""></label>
        <a href="logout.php">Fazer Logoff</a>
    </div>
</body>
</html>

