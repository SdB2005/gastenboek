<!DOCTYPE html>
<html>

<head>
  <style>
    html {
      width: 100%;
      height: 100%;
      background: rgb(5, 108, 140);
      background: radial-gradient(circle, rgba(5, 108, 140, 1) 0%, rgba(16, 1, 189, 1) 100%);
    }

    .container {
      border: 2px solid #dedede;
      background-color: #f1f1f1;
      border-radius: 5px;
      padding: 10px;
      margin: 10px 0;
      width: 500px;
      position: relative;
      left: 500px;
      top: 150px;

    }

    .button input {
      border: none;
      color: #fff;
      font-size: 17px;
      font-weight: 500;
      letter-spacing: 1px;
      border-radius: 6px;
      background-color: #4070f4;
      cursor: pointer;
      transition: all 0.3s ease;
      width: 500px;
      height: 30px;

    }

    .button input:hover {
      background-color: #265df2;
    }

    #Gast-title {
      position: absolute;
      left: 510px;
      top: 100px;
    }
    #div-1 {
      background-color: #265df2;
      border-radius: 5px;
      text-align: center;
    }
  </style>
  <title>Gast Berichten</title>
</head>

<body>
  
  <h1 id="Gast-title">Gastenboek Berichten:</h1>
  <div class="container">
    <div class="input-field button">
      <a href="gastform.php">
        <input name="submit" type="submit" value="Maak bericht">
      </a>
    </div>
    <p>---------------------------------------------------------------------------------------------</p>
   
      <?php
      foreach (file("data.txt") as $line) {
        $message = json_decode($line);
        $naam = $message->name;
        $bericht = $message->msg;
        $date = $message->date;

        echo "<div id='div-1'><h3>" . $naam . "</h3>" . $bericht . "<br>" . $date . "</div>";
      } ?>
  </div>

</body>

</html>