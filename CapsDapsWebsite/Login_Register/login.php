<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>

    <div class="container">

    <?php
        if(isset($_POST["login"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM registeredUsers WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

            if($user){
                if(password_verify($password, $user["password"])){
                    //If this code executes then user exist in database
                    //Now redirect user to home page.
                    //header("location: nameOfFile");
                    header("Location: ../Website/homePage.php");
                    die();
                }
                else{
                    echo "<div class='alert alert-danger'>Password doesn't match</div>";
                }
            }
            else{
                echo "<div class='alert alert-danger'>Emaiil doesn't match</div>";
            }
        }
    ?>

        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" name="email" placeholder="Enter email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Enter password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
    </div>
    
</body>
</html>