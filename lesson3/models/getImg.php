<?php


$sql = "select * from img";

$res = mysqli_query($connect, $sql);
$i = 0;
 while ($row = mysqli_fetch_assoc($res)) {
     $i++;
     $photo[$i] = [$row['title'], $row['path'], $row['type']];
}
