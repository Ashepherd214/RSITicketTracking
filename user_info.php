<html>
<body>

The current information we have from the submitter of the ticket is
<?php
// define variables and initialize with empty values
$firstNameErr = $lastNameErr = $emailErr = $deptErr = $extErr = "";
$firstName = $lastName = $email = $dept = $ext = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first_name"])) {
    $firstNameErr = "First name is required";
  } else {
    $firstName = test_input($_POST["first_name"]);
  }
  if (empty($_POST["last_name"])) {
    $lastNameErr = "Last name is required";
  } else {
    $lastName = test_input($_POST["last_name"]);
  }
  if (empty($_POST["user_mail"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["user_mail"]);
  }
  $dept = test_input($_POST["user_ext"]);
  if (empty($_POST["user_ext"])) {
    $extErr = "";
  } else {
    $ext = test_input($_POST["user_ext"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo "<br><br>" . $firstName . " " . $lastName . "<br>";
echo $email . "<br>";
echo $dept . "<br> ext: " . $ext;
?>

<div>
  <a href="index.html">
    <input type="button" value="Go Back" class="subBackHome">
  </a>
</div>
<div>
  <a href="NewTicket.html">
    <input type="submit" value="Continue" class="infoSubmit">
  </a>
</div>

</body>
</html>
