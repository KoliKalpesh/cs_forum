<?php
session_start();
echo 'Loggin you out please wait';
session_destroy();

header("Location: /cs_forum")

?>