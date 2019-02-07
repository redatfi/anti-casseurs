<?php
header('Content-type: text/html; charset=UTF-8');
include('conf.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query('SET NAMES utf8');
$sql = "SELECT identity, circo, parti FROM depute";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>En votant pour, ils ont votés contre nos libertés.</title>
  </head>
  <body>
    <div class="header">
      <p>En votant pour, ils ont voté contre nos libertés.</p>
      <p class="desc">Découvrez la liste des députés qui ont voté pour la loi liberticide "anti-casseurs"</p>
      <p class="icon"><i class="fas fa-arrow-circle-down"></i></p>
    </div>
    <div class="table">
      <table>
        <tr>
          <th>Prénom / Nom</th>
          <th>Circonscription</th>
          <th>Groupe Parlementaire</th>
        </tr>
        <?php
        while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["identity"]."</td><td>".$row["circo"]."</td><td>".$row["parti"]."</td>";
        }
        $conn->close();
        ?>
      </table>
    </div>
    <div class="footer">
    </div>
  </body>
</html>
