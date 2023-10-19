<?php
$file = fopen("notes.txt", "r");

while (!feof($file)) {
    $line = fgets($file);

    $myArray[] = explode(' ', $line);}

fclose($file);

\array_splice($myArray,$_POST['delete']-1, 1);

$n = count($myArray);
$file =fopen("notes.txt", "w");
foreach ($myArray as $sub) {
    $i = 1;
    foreach ($sub as $elem) {
        if ($i == count($sub)){
            fwrite($file,$elem);
        } else {
            fwrite($file,$elem . ' ');
        }
        $i = $i + 1;
    }
}

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