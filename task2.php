<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
    .error{
      color: red;
    }
  </style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $dobErr = $genderErr =$degreeErr=$bloodgroupErr="";
$name = $email = $dob = $gender =$bloodgroup= $count="";

$degree = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else 
  {
    $name = $_POST["name"];
    
    if (!preg_match("/^[a-zA-Z-' .]*$/",$name) || str_word_count($name)<2 )
    {
      $nameErr = "Only letters and must have two word";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["dob"])) {
    $dobErr = "Date of birth is required";
  } else {
    $dob = $_POST["dob"];  
  }


  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }

 if (empty($_POST["degree"]) ) 
  {
    $degreeErr = "Degree is required";
  } 
  else 
  {
    foreach($_POST['degree'] as $selected_degree)

  {
    $count++;
  }
    if ($count<2)
    {
      $degreeErr = "Must mark atleast two option";
    }
    
  }
     if (empty($_POST["bloodgroup"])) 
  {
    $bloodgroupErr = "Blood_Group is required";
  } 
  else 
  {
    $bloodgroup = $_POST["bloodgroup"];
  }
}
?>






<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">

  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail:
  <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Date of birth:
   <select name="Year">
  <option value="">Select year</option>
  <?php for ($i = 1980; $i < date('Y'); $i++) : ?>
  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
</select>
<select name="Month">
  <option value="">Select month</option>
  <?php for ($i = 1; $i <= 12; $i++) : ?>
  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
</select>
<select name="Date">
  <option value="">Select date</option>
  <?php for ($i = 1; $i <= 31; $i++) : ?>
  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
</select>
  <br><br>

  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Degree:
 Degree:
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="ssc") echo "checked";?> value="ssc">SSC
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="hsc") echo "checked";?> value="hsc">HSC
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="bsc") echo "checked";?> value="bsc">BSc
  <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="msc") echo "checked";?> value="msc">MSc
  <span class="error">* <?php echo $degreeErr;?></span>
  <br><br>
  Blood Group:
  <select name="bloodgroup">
  <option></option>
  <option name="bloodgroup" <?php if (isset($bloodgroup) && $bloodgroup=="a+") echo "checked";?> value="a+">A+</option>
  <option name="bloodgroup" <?php if (isset($bloodgroup) && $bloodgroup=="a-") echo "checked";?> value="a-">A-</option>
  <option name="bloodgroup" <?php if (isset($bloodgroup) && $bloodgroup=="b+") echo "checked";?> value="b+">B+</option>
  <option name="bloodgroup" <?php if (isset($bloodgroup) && $bloodgroup=="b-") echo "checked";?> value="b-">B-</option>
  <option name="bloodgroup" <?php if (isset($bloodgroup) && $bloodgroup=="o+") echo "checked";?> value="o+">O+</option>
  <option name="bloodgroup" <?php if (isset($bloodgroup) && $bloodgroup=="o-") echo "checked";?> value="o-">O-</option>
   <option name="bloodgroup" <?php if (isset($bloodgroup) && $bloodgroup=="ab+") echo "checked";?> value="ab+">AB+</option>
  <option name="bloodgroup" <?php if (isset($bloodgroup) && $bloodgroup=="ab-") echo "checked";?> value="ab-">AB-</option>
  </select>
  <span class="error">* <?php echo $bloodgroupErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">

</form>


<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";

echo $email;
echo "<br>";

echo $dob;
echo "<br>";

echo $gender;
echo "<br>";

foreach($_POST['degree'] as $selected_degree)
  {
    if($count>1)
    {
      echo $selected_degree. " ";
    }
  }
echo "<br>";

echo $bloodgroup;
?>





</body>
</html>

