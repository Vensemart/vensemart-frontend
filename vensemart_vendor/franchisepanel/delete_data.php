<?php
include("../lib/config.php");


mysqli_query($GLOBALS["___mysqli_ston"],"DELETE FROM credit_debit");
mysql_query($GLOBALS["___mysqli_ston"],"DELETE FROM amount_detail");

mysqli_query($GLOBALS["___mysqli_ston"],"DELETE FROM `lifejacket_subscription` WHERE id > (select id from (select id FROM `lifejacket_subscription` ORDER BY `id` Asc LIMIT 0, 1) x)");

mysqli_query($GLOBALS["___mysqli_ston"],"DELETE FROM `user_registration` WHERE id > (select id from (select id FROM `user_registration` ORDER BY `id` Asc LIMIT 0, 1) x)");




