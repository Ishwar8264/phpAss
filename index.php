<!DOCTYPE html>
<html>

<head>
    <style>
    .error {
        color: #FF0001;
    }

    form {
        background-color: #ecd8d8;
        padding-left: 190px;
        padding-top: 19px;
        border-radius: 12px;
    }

    .field {
        margin-left: 30px;
    }

    input {
        padding: 5px;
    }
    </style>
</head>

<body>

    <?php  
// define variables to empty values  
$nameErr = $emailErr = $mobilenoErr = $genderErr  = $agreeErr = "";  
$name = $email = $mobileno = $gender  = $agree = "";  
  
//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
//String Validation  
    if (empty($_POST["name"])) {  
         $nameErr = "Name is required";  
    } else {  
        $name = input_data($_POST["name"]);    
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
    }  
      
    //Email Validation   
    if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } else {  
            $email = input_data($_POST["email"]);    
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  
    
    //Number Validation  
    if (empty($_POST["mobileno"])) {  
            $mobilenoErr = "Mobile no is required";  
    } else {  
            $mobileno = input_data($_POST["mobileno"]);  
            if (!preg_match ("/^[0-9]*$/", $mobileno) ) {  
            $mobilenoErr = "Only numeric value is allowed.";  
            }   
        if (strlen ($mobileno) != 10) {  
            $mobilenoErr = "Mobile no must contain 10 digits.";  
            }  
    }  
   
      
    //Empty Field Validation  
    if (empty ($_POST["gender"])) {  
            $genderErr = "Gender is required";  
    } else {  
            $gender = input_data($_POST["gender"]);  
    }  
  
    //Checkbox Validation  
    if (!isset($_POST['agree'])){  
            $agreeErr = "Accept terms of services before submit.";  
    } else {  
            $agree = input_data($_POST["agree"]);  
    }  
}  
function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?>


    <h2>Registration Form</h2>
    <span class="error">* required field </span>
    <br><br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Name:
        <input type="text" name="name" class="field">
        <span class="error">* <?php echo $nameErr; ?> </span>
        <br><br>
        E-mail:
        <input type="text" name="email" class="field">
        <span class="error">* <?php echo $emailErr; ?> </span>
        <br><br>
        Mobile No:
        <input type="text" name="mobileno">
        <span class="error">* <?php echo $mobilenoErr; ?> </span>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="other"> Other
        <span class="error">* <?php echo $genderErr; ?> </span>
        <br><br>
        Agree to Terms of Service:
        <input type="checkbox" name="agree">
        <span class="error">* <?php echo $agreeErr; ?> </span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        <br><br>
    </form>

    <?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == "" && $emailErr == "" && $mobilenoErr == "" && $genderErr == "" && $agreeErr == "") {  
        echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$name;  
        echo "<br>";  
        echo "Email: " .$email;  
        echo "<br>";  
        echo "Mobile No: " .$mobileno;  
        echo "<br>";
        echo "Gender: " .$gender;  
    } else {  
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
    }  
    }  
?>

</body>

</html>