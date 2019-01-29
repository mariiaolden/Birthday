<?php
  $name = '';
  $email = '';
  $songs = [];
  if ($_GET['id'] != '') {
    $servername = "localhost"; // локалхост
    $username = "root"; // имя пользователя
    $password = "8956562132"; // пароль если существует
    $dbname = "birthday"; // база данных

    // Создание соединения
    $conn = new mysqli($servername, $username, $password, $dbname);
    // check connection
    if (mysqli_connect_errno()) {
      echo 'Connect failed: '. mysqli_connect_error();
    }

    $sql = "SELECT `id`, `Name`, `description` FROM `songs` WHERE `id` IN (SELECT `song_id` FROM `id` WHERE `user_id`=".$_GET['id'].")";
    $results = $conn->query($sql);
    while($row = $results->fetch_array()) {
      $songs.push($row);
    }

    // header('Location: birthday.php?name='. $_POST['name']. '&email='. $_POST['email']);

// SELECT `id`, `Name`, `description` FROM `songs` WHERE `id` IN (SELECT `song_id` FROM `id` WHERE `user_id`=25)
    // Закрыть подключение
    $conn->close();
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    Welcome <?php echo $_GET["id"]; ?><br>
    Your E-Mail <?php echo $_GET["id"]; ?><br>
    </form>
  </body>
</html>
