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
    <?php include 'include/nav.php' ?>
    <?php 
    $error_login="";
    $invalid_login="";
    $invalid_date="";
    if(isset($_POST['login'])){
      $cne=$_POST['cne'];
      $date = date("Y-m-d", strtotime($_POST['date_ness']));

      if(!empty($cne) && !empty($date)){
        require_once 'include/base_donner.php';
        $sqlStat=$pdo->prepare('SELECT * FROM etudiant WHERE cne=? and date_ness=?');
        $sqlStat->execute([$cne,$date]);
        if($sqlStat->rowCount()>=1){
          $_SESSION['etudiant']=$sqlStat->fetch();
          header('location:etudiant_cour.php');
        }else{$error_login='votre CNE ou date naicanse est incorect';}

      }else{
        if(!empty($cne)){
          $invalid_login="is-invalid";
        }else{
          $invalid_login="invalid-feedback";
        }
      }

    }
    
    ?>
    <form method="post">
  <div class="container py-4">

    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card border-0 shadow p-3" style="border-radius: 1rem;">
          <div class="card-body p-5">

            <h3 class="mb-5 text-center">Sign in</h3>
            <div data-mdb-input-init class="form-outline ">
              <label class="form-label" for="typeEmailX-2"></label>
              <input type="text" id="typeEmailX-2" value="" name="cne" placeholder="Entre votre CIN " class="form-control form-control-lg <?= $invalid_login ?> " />
            </div>

            <div data-mdb-input-init class="form-outline">
              <label class="form-label" for="typePasswordX-2"></label>
              <input type="date" id="typePasswordX-2" placeholder="Entre votre dte de naicense" name="date_ness" class="form-control form-control-lg  <?= $invalid_date?> " />
            </div>
            <div class="text-danger bold py-1">
      </div>
      <div class="text-danger bold py-1"><?= $error_login?>
            <button name="login" class="btn btn-primary w-100 btn-lg btn-block" type="submit">Login</button>

          </div>
        </div>
      </div>
    </div>
  </div>
    </form>
    <script src="script/script.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>