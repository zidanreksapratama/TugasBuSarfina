<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$nimErr = $nameErr = $emailErr = $alamatErr = "";
$nim = $name = $email = $alamat = "";
$nim_default = "NIM : 22090109";
$name_default = "NAMA : ZIDAN REKSA PRATAMA";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nim"])) {
    $nimErr = "Nim Harus Diisi";
  } else {
    $nim = test_input($_POST["nim"]);
      if (!preg_match("/^[0-9]*$/",$nim)) {
        $nimErr = "Hanya dapat diisi angka";
      }
  }

  if (empty($_POST["name"])) {
    $nameErr = "Nama harus diisi";
  } else {
    $name = test_input($_POST["name"]);
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Hanya apat diisi huruf";
      }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email harus diisi";
  } else {
    $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
  }
    
  if (empty($_POST["alamat"])) {
    $alamatErr = "Alamat harus diisi";
  } else {
      $alamat = test_input($_POST["alamat"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP CONTOH FORM VALIDASI</h2>
<p><span class="error">* Wajib Diisi</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nim: <input type="text" name="nim" value="<?php echo $nim;?>">
  <span class="error">* <?php echo $nimErr;?></span>
  <br><br>
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Alamat: <input type="text" name="alamat" value="<?php echo $alamat;?>">
  <span class="error">* <?php echo $alamatErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>DEFAULT:</h2>";
echo $nim_default;
echo "<br>";
echo $name_default;
echo "<br>";
?>

<?php
echo "<h2>HASIL INPUT:</h2>";

if (empty($nimErr)) {
  echo $nim;
  echo "<br>";}

if (empty($nameErr)) {
  echo $name;
  echo "<br>";}

if (empty($emailErr)) {
  echo $email;
  echo "<br>";}

echo $alamat;
echo "<br>";
?>

</body>
</html>