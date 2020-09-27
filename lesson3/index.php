<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style='display: grid;
    grid-template-columns: 1fr 1fr 1fr;'>
<?php
$foto = scandir("img");

for($i=3;$i<count($foto);$i++):
    ?>

    <span><a target="blank" href="img/<?= $foto[$i]?>"><img style='width: 300px' src="img/<?= $foto[$i]?>" alt=""></a></span>


<?php endfor?>
</body>
</html>
