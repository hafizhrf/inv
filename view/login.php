<?php
    session_start();
    if(!empty($_SESSION['user_id']))
    {
        if($_SESSION['level'] == 'admin'){
            header("Location: indexadmin.php");
        }
        elseif($_SESSION['level'] == 'pegawai'){
            header("Location: indexpegawai.php");
        }
        else{
            header("Location: indexpeminjam.php");
        }
    }
    $login_error_message = "";
    // Application library ( with DemoLib class )
    require_once("loginClass.php");
        $app = new Validation();

    if (!empty($_POST['Login'])) {
 
        $username = ($_POST['username']);
        $password = ($_POST['password']);
     
        if ($username == "") {
            $login_error_message = 'Kolom username harus diisi!';
        } else if ($password == "") {
            $login_error_message = 'Kolom password harus diisi!';
        } else {
            $user = $app->Login($username, $password); // check user login
            if($user > 0)
            {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['level'] = $user->level;
                if($user->level == 'admin'){
                    header("Location: indexadmin.php");
                }
                elseif($user->level == 'pegawai'){
                    header("Location: indexpegawai.php");
                }
                else{
                    header("Location: indexpeminjam.php");
                }
            }
            else
            {
                $login_error_message = 'Password Atau Username salah';
            }
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
</head>
<body>
 
<div class="container">
    <div class="card col-md-5 well">
    <div class="row">
        
        <div class="col-md-5 well">
            <h4>Login</h4>
            <?php
        if ($login_error_message != "") {
            echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
        }
        ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="Login" class="btn btn-primary" value="Login"/>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
</body>
</html>