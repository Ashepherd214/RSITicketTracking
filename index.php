<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>RSI Ticket Tracker</title>
    <link rel="stylesheet" href="styles/stylesheet.css">
  </head>
  <body>

    <?php
    // define variables and initialize with empty values
    $firstNameErr = $lastNameErr = $emailErr = $deptErr = $extErr = "";
    $firstName = $lastName = $email = $dept = $ext = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (empty($_POST["first_name"])) {
        $firstNameErr = "First name is required";
      } else {
        $firstName = test_input($_POST["first_name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
          $firstNameErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["last_name"])) {
        $lastNameErr = "Last name is required";
      } else {
        $lastName = test_input($_POST["last_name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
          $lastNameErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["user_mail"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["user_mail"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }

      $dept = test_input($_POST["user_dept"]);

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
    ?>

    <img src="images/rsi-logo-trans-300.png" alt="My test image">
    <h1>RSI Ticket Tracker</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      <div>
        <label for="fName">First name: </label>
        <input type="text" id="fName" name="first_name" value="<?php echo $firstName;?>">
        <span class="error">* <?php echo $firstNameErr;?></span>
        <br><br>
      </div>
      <div>
        <label for="lName">Last name: </label>
        <input type="text" id="lName" name="last_name" value="<?php echo $lastName;?>">
        <span class="error">* <?php echo $lastNameErr;?></span>
        <br><br>
      </div>
      <div>
        <label for="mail">E-mail: </label>
        <input type="email" id="mail" name="user_mail" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
      </div>
      <div>
        <label for="dept">Department: </label>
        <select id="dept" name="user_dept">
          <option value="Engineering">Engineering</option>
          <option value="Facilities">Facilities</option>
          <option value="Database">Database</option>
          <option value="ProgramManagement">Program Management</option>
          <option value="Product Support">Product Support</option>
          <option value="Logistics">Logistics</option>
          <option value="TestAndEval">Test and Evaluation</option>
          <option value="IG/Electronics">IG/Electronics Assymebly</option>
          <option value="Sales/Marketing">Sales & Marketing</option>
          <option value="Finance">Finance</option>
        </select>
        <span class="error">* <?php echo $deptErr;?></span>
        <br><br>
      </div>
      <div>
        <label for="ext">Ext: </label>
        <input type="number" id="ext" name="user_ext" value="<?php echo $ext;?>">
        <span class="error">* <?php echo $extErr;?></span>
        <br><br>
      </div>
      <input type="submit">
    </form>
    <!--<div>
      <a href="NewTicket.html">
        <input type="submit" value="Submit info" class="infoSubmit">
      </a>
    </div> -->

    <div class="resultsPara">
      <p class="fullName"></p>
      <p class="user"></p>
      <p class="mail"></p>
      <p class="dept"></p>
      <p class="extension"></p>
    </div>

    <script>
      var fullName = document.querySelector('.fullName');
      var user = document.querySelector('.user');
      var mail = document.querySelector('.mail');
      var dept = document.querySelector('.dept');
      var extension = document.querySelector('.extension');
      //var lastName = document.querySelector('.lastName');

      var infoSubmit = document.querySelector('.infoSubmit');
      var first = document.querySelector('.firstField');
      var last = document.querySelector('.lastField');
      var userField = document.querySelector('.userField');
      var emailField = document.querySelector('.emailField');
      var deptField = document.querySelector('.deptField');
      var extField = document.querySelector('.extField');


      function saveInfo() {
        //var fullName = (firstNameField.value + ' ' + lastNameField.value);
        var extensionNum = Number(extField.value);

        fullName.textContent = 'Name: ' + first.value + ' ' + last.value;
        user.textContent = 'Username: ' + userField.value;
        mail.textContent = 'Email Address: ' + emailField.value;
        dept.textContent = 'Department: ' + deptField.value;
        extension.textContent = 'Ext: ' + extField.value.toString();


        blankForm();
      }

      infoSubmit.addEventListener('click', saveInfo);

      function blankForm() {
        firstField.value = '';
        lastField.value = '';
        userField.value = '';
        emailField.value = '';
        deptField.value = '';
        extField.value = '';
      }
      //JavaScript here
    </script>
  </body>
</html>
