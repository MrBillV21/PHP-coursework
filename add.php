<?php
$file = fopen('notes.txt', 'a+');
fputs($file,date("d.m.y") . ' ' . $_POST['note'] . PHP_EOL);
fclose($file);

$file = fopen("account.txt", "r");
    while (!feof($file)) {
        $pass = fgets($file);
        $acc = explode(' ', $pass);
    }

$new_url = 'index.php?email='.$acc[0].'&password='.$acc[1].'#';
header('Location: ' . $new_url);

exit();
?>