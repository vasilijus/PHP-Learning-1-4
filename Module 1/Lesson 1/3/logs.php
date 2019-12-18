<?php
print("Begin Lesson 1 <br><hr> Read from log.txt<br>");
// $str = file_get_contents('log.txt');
// var_dump($str);

$data = file('log.txt');

// for( $i = 0; $i < count($data); $i++ ) {   echo $data[$i]; }

echo "<table>";
for( $i = 0; $i < count($data); $i++ ) {
    echo "<tr>";
    $info = explode('-@_@-', rtrim($data[$i] ) );
    foreach($info as $elem) {
        echo "<td>".$elem."<td>";
    }
    echo "<tr>";
}
echo "</table>";
?>

<style>
table, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding:5px 3px;
}
</style>