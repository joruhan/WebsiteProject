<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>
<body>
    <h1 class="h1-register">Registration Form</h1>
    <div class="container">
        <form action="registration.php" method="post">
    
        <?php
        if(isset($_POST["submit"])){
            $username= $_POST["username"];
            $password= $_POST["password"];
            $confirmPassword= $_POST["repeat_password"];
            $email= $_POST["email"];
            
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();

            if(empty($username) OR empty($password) OR empty($confirmPassword) OR empty($email)){
                array_push($errors, "All fields must contain a value");
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errors, "Enter a valid email");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 characters");
            }
            if($password != $confirmPassword){
                array_push($errors, "Password doesn't match");
            }

            require_once "database.php";
            $sql = "SELECT * FROM registeredUsers WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if($rowCount > 0){
                array_push($errors, "Email already exist");
            }

            if(count($errors) > 0){
                foreach($errors as $error){
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
            else{
                $sql = "INSERT INTO registeredUsers (userName, password, email) VALUES(?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepare = mysqli_stmt_prepare($stmt, $sql);

                if($prepare){
                    mysqli_stmt_bind_param($stmt,"sss",$username,$passwordHash,$email);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Successfully Registered</div>";

                    header("Location: ../Website/homePage.php");
                    die();
                }
                else{
                    die("Something went wrong");
                }
            }
        }
        ?>

            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div><br>
            <div class="form-login">
                <h6>Alread a user. <a href="login.php">Login here</a></h6>
            </div>
        </form>
    </div>
</body>
</html>