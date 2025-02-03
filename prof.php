<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prof</title>
  <!-- ============= style css ============== -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/input.css">
    <!-- ============== GOOFLE FONT TEXT =========== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

</head>
<body>
<div class="prof vh-100 " style="background-color: #f9f9f9;">
    <?php include 'include/nav.php' ?>
<?php
    $login="";
   $invalid_login= "";
   $invalid_pass="";
   $error="";
    if(isset($_POST['login'])){
        $login= $_POST['user'];
        $pasw=$_POST['password'];
        if(!empty($login) && !empty($pasw)){
            require_once 'include/base_donner.php';

            $conect=$pdo->prepare('SELECT * FROM prof WHERE login=? AND password=?');
            $conect->execute([$login,$pasw]);
        $user = $conect->fetch();

        if ($user) { // ✅ Vérifier si un utilisateur a été trouvé
            $_SESSION['user'] = $user;
            header('location:ajouter_cour.php');
            exit(); // ✅ Toujours ajouter `exit();` après une redirection
        }else{
              $error="login or password incorrect";
            }
        }else{
          if(empty($login)){
          $invalid_login= "is-invalid";
      }else{
        $invalid_pass="is-invalid";
      }
    }
    }
?>
    
    <form method="post">
  <div class="container py-4">
    <div class="row d-flex justify-content-start align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card border-0 shadow p-3" style="border-radius: 1rem;">
          <div class="card-body p-5">

            <h3 class="mb-5 text-center">Sign in</h3>
            <div data-mdb-input-init class="form-outline mb-4">
              <label class="form-label" for="typeEmailX-2">Email</label>
              <input type="text" id="typeEmailX-2" value="<?= $login ?>" name="user" class="form-control form-control-lg <?= $invalid_login ?>" />
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
              <label class="form-label" for="typePasswordX-2">Password</label>
              <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg <?= $invalid_pass ?> " />
            </div>
            <div class="text-danger bold py-1"><?= $error?>
      </div>

            <button name="login" class="btn btn-primary w-100 btn-lg btn-block" type="submit">Login</button>

          </div>
        </div>
      </div>
    </div>
  </div>
    </form>
</div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>