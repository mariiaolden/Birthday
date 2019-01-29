
<?php
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

function query($conn, $query)
  {
    if ($conn->query($query) === TRUE) {
      echo "succesfully added new data<br>";
    } else {
      echo "Error: " . $query . "<br>" . $conn->error;
    }
  }

  if ($_POST["name"] != "" && $_POST["email"] != "") {
    query($conn, "INSERT INTO `guest` (`Name`, `E-mail`) VALUES ('". $_POST['name']. "','". $_POST['email']."' )");

    if ($_POST["song1"] != "") {
      query($conn, "INSERT INTO `songs` (`Name`) VALUES ('". $_POST['song1']. "')");
    }

    if ($_POST["song2"] != "") {
      query($conn, "INSERT INTO `songs` (`Name`) VALUES ('". $_POST['song2']. "')");
    }

    if ($_POST["song3"] != "") {
      query($conn, "INSERT INTO `songs` (`Name`) VALUES ('". $_POST['song3']. "')");
    }
  }

  // Закрыть подключение
  $conn->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="birthday.php" method="post">
      Name: <input type="text" name="name"><br>
      E-mail: <input type="text" name="email"><br>
      Song1: <input type="text" name="song1"><br>
      Song2: <input type="text" name="song2"><br>
      Song3: <input type="text" name="song3"><br>
      <input type="submit">
    </form>

    Welcome <?php echo $_GET["name"]; ?><br>
    Your E-Mail <?php echo $_GET["email"]; ?><br>
    </form>
  </body>
</html>
