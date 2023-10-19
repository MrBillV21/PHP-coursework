<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title name="notes">Заметки</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="site">
    <div id="enter" class="site">
        <h1>Вход в мой дневник</h1>
        <form method="GET">
            <p>Введите вашу почту</p>
            <input type="text" name="email">
            <p>Введите пароль</p>
            <input type="text" name="password">
            <p><input type="submit" value="войти"></p>
        </form>
        <p id="never" style='display: none'>Неверные данные</p>
    </div>
    <div id="NotesPage" style='display: none'>
        <div><h1 name="Header">Дневник для заметок</h1></div>
        <div>    
        <ul class="nav">
                <li><a href="#"onclick = "document.getElementById('NotesPage').style.display='block';">Мои заметки</a></li>
                <li><a href="#"onclick = "document.getElementById('NotesPage').style.display='none'; document.getElementById('AddPage').style.display='block';">Добавление заметки</a></li>
                <li><a href="#"onclick = "document.getElementById('NotesPage').style.display='none'; document.getElementById('DeletePage').style.display='block';">Удаление заметки</a></li>
        </ul>
        </div>
        <hr name="line">
        <h3>Мои заметки</h3>
        
        <?php
        $file = fopen("notes.txt", "r");
            while (!feof($file)) {
                $line = fgets($file);
                $myArray[] = explode(' ', $line);
            }
        fclose($file);
        $n = count($myArray);
        $x = 0;
        
        if ($myArray[0][0] == '') {
            Echo "<h3>У вас ещё нет записей</h3>";
        } else {
            echo '<div class="neck"><table>';
            echo "<tr><th>Дата</th><th>Заметка</th></tr>";
            foreach ($myArray as $sub) {
                $x = $x + 1;
                if (count($myArray) == $x) {
                    break;
                }
                echo "<tr><td>" . $sub[0] . "</td>";
                echo '<td>'; 
                for($i = 0;$i < count($sub);$i++) {
                    echo ' ' . $sub[$i+1];
                }
                echo "</td></tr>";
            }
            echo '</table></div>';
        }

        ?>
        
    </div>
    <div id="AddPage" style='display: none'>
        <div><h1 name="Header">Дневник для заметок</h1></div>
        <div>    
        <ul class="nav">
            <li><a href="#" onclick = "document.getElementById('AddPage').style.display='none'; document.getElementById('NotesPage').style.display='block';">Мои заметки</a></li>
            <li><a href="#" onclick = "document.getElementById('AddPage').style.display='block';">Добавление заметки</a></li>
            <li><a href="#" onclick = "document.getElementById('AddPage').style.display='none'; document.getElementById('DeletePage').style.display='block';">Удаление заметки</a></li>
        </ul>
        <hr name="line">
        <h3>Добавление заметки</h3>
        <form action="add.php" method="post">
            <textarea cols=50 rows=8 name=note placeholder="Введите вашу заметку здесь"></textarea>
            <input type="submit" value="Добавить">
        </form>
        </div>
    </div>
    <div id="DeletePage" style='display: none'>
        <div><h1 name="Header">Дневник для заметок</h1></div>
        <div>    
        <ul class="nav">
            <li><a href="#" onclick = "document.getElementById('DeletePage').style.display='none'; document.getElementById('NotesPage').style.display='block';">Мои заметки</a></li>
            <li><a href="#" onclick = "document.getElementById('DeletePage').style.display='none';  document.getElementById('AddPage').style.display='block';">Добавление заметки</a></li>
            <li><a href="#" onclick = "document.getElementById('DeletePage').style.display='block';">Удаление заметки</a></li>
        </ul>
        <hr name="line">
        <h3>Удаление заметки</h3>
        <?php
        $n = count($myArray);
        $x = 0;
        if ($myArray[0][0] == '') {
            Echo "<h3>У вас ещё нет записей</h3>";
        } else {
            echo '<div class="neck"><table>';
            echo "<tr><th>Дата</th><th>Заметка</th><th>Номер</th></tr>";
            foreach ($myArray as $sub) {
                $x = $x + 1;
                if (count($myArray) == $x) {
                    break;
                }
                echo "<tr><td>" . $sub[0] . "</td>";
                echo '<td>'; 
                for($i = 0;$i < count($sub);$i++) {
                    echo ' ' . $sub[$i+1];
                }
                echo "</td><td>$x</td></tr>";
            }
            echo '</table></div>';
            echo '<form action="delete.php" method="POST">';
            echo 'Укажите номер строки, которую хотите удалить:';
            echo '<input type="text" name="delete">';
            echo '<input type="submit" value="Удалить">';
            echo '</form>';
        }
        ?>
    </div>
    </div>
    <?php
    $file = fopen("account.txt", "r");
    while (!feof($file)) {
        $pass = fgets($file);
        $acc = explode(' ', $pass);
    }
    fclose($file);
    $h = 0;
    if ($_GET['email'] == $acc[0] and $_GET['password'] == $acc[1]) {
        echo '<script>document.getElementById(' . '"enter"' . ').style.display='.'"none"'.';</script>';
        echo '<script>document.getElementById(' . '"NotesPage"' . ').style.display='.'""'.';</script>';
    }
    ?>
</body>
</html>