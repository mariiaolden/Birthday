<?php
  if ($_POST['name'] != '' && $_POST['email'] != '') {
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

    function getUserId($conn, $email) {
      $results = $conn->query("SELECT id FROM guest WHERE `E-mail`='$email' LIMIT 1");
      return $results->fetch_assoc()['id'];
    }

    $id = getUserId($conn, $_POST['email']);

    if (!$id) {
      $sql = "INSERT INTO `guest` (`Name`, `E-mail`) VALUES ('".$_POST['name']."','".$_POST['email']."')";
      $conn->query($sql);

      $id = getUserId($conn, $_POST['email']);

      header('Location: birthday.php?id='.$id);
    }

    header('Location: songs.php?id='.$id);

    // Закрыть подключение
    $conn->close();
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <form class="needs-validation" novalidate method="post">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationTooltip01">First name</label>
      <input name="name" type="text" class="form-control" id="validationTooltip01" placeholder="First name" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationTooltipEmail">E-mail</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="validationTooltipEmailPrepend">@</span>
        </div>
        <input name="email" type="text" class="form-control" id="validationTooltipEmail" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
        <div class="invalid-tooltip">
          Please choose a unique and valid e-mail.
        </div>
      </div>
    </div>
  </div>

  <button class="btn btn-primary" type="submit">Submit</button>
</form>
</body>
</html>
