<?php
echo "rahuljaysawal";
$showaleart = false;
$showerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    //  $exists = false;
    //check whether this username exists
    $existSql = "SELECT * from user where name = '$username'";
    $result = mysqli_query($conn, $existSql);
    // $numExitsRows = mysqli_num_rows($result);

    $numExitsRows = mysqli_num_rows($result);
    if ($numExitsRows > 0) {
        // $exists = true;
        $showerror = "Username Already Exist";
    } else {
        // $exists = false;

        //////////////////////////////////////
        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`name`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp())";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showaleart = true;
                echo "rahul";
            }
        } else {
            $showerror = "password do not match";
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Signup</title>
</head>

<body>
    <?php
    require 'partials/_nav.php';
    ?>
    <?php
    if ($showaleart) {
        echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You account is now created and you can login
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if ($showerror) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> ' . $showerror . ' 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class="container">
        <h1 class="text-centre">Signup to our website</h1>

        <form action="signup.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength="12" class="form-control" id="username" name="username" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Conform Password</label>
                <input type="password" class="form-control" id="cPassword" name="cpassword">
                <div id="emailHelp" class="form-text">Make sure to type the same password.</div>
            </div>

            <button type="submit" class="btn btn-primary">Signup</button>
        </form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>