<?php
include('config.php');
$res = mysqli_query($connection, "DESCRIBE users");
while ($row = mysqli_fetch_assoc($res)) {
    echo $row['Field'] . "\n";
}
?>
