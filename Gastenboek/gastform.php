<?php
if ($_POST) {
  isset($_COOKIE["BoekCookie"]);
  $message = new stdClass();
  $message->name = $_POST['name'];
  $message->msg = $_POST['msg'];
  $message->date = date("d.m.Y H:i:s");

  //zet data van form in data.txt
  $json = json_encode($message);

  //cookies 
  $cookie_name = "cookie";
  $cookie_value = "cookie";
  setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day
  //checked of cookies aan staan
  if (isset($_POST['submit'])) {
    if (count($_COOKIE) > 0) {
      echo '<script type="text/JavaScript">alert("U heeft al een bericht verstuurd.");</script>';
    } else {
      file_put_contents("data.txt", $json . "\r\n", FILE_APPEND);
      echo '<script type="text/JavaScript">alert("Uw bericht wordt verzonden!");</script>';
    }
  }
}

?>
<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
  <title>Maak Bericht</title>
</head>

<body>

  <div class="container">
    <a href="index.php">
      <button class="return-button" style="width: 50px; float: right; background-color: #265df2; color: white;">Terug</button>
    </a>

    <div class="forms">
      <div class="form login">
        <span class="title">Gastenboek Bericht</span>

        <form method="POST">
          <div class="input-field">
            <input name="name" type="text" placeholder="Uw naam" required>
          </div>
          <div class="input-field">
            <input name="msg" type="bericht" class="bericht" placeholder="Hier uw bericht" required>
          </div>
          <div class="input-field button">
            <input name="submit" type="submit" value="Versturen">
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>