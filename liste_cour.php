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
<body><div class="list_cour" style="background-color: #f9f9f9e0;min-height:100vh;">
        <div class="container">
        <?php include 'include/nav.php' ?>
    <?php 


    $id_prof=$_SESSION['user']['id'];
    require_once 'include/base_donner.php';
    $sqlStat=$pdo->prepare('SELECT * FROM cour WHERE id_prof=?');
    $sqlStat->execute([$id_prof]);
    $cours=$sqlStat->fetchaLL(PDO::FETCH_ASSOC);
    ?>
    
    <div class="row d-flex align-content-between  flex-wrap ">
    <?php foreach($cours as $cour){
        $id=$cour['id'];
        ?>
        

  <div class="col-sm-6 col-md-5 col-xl-4  mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?= $cour['nom_cour']?> </h5>
        <p class="card-text"><?= $cour['filier']?> |  S<?= $cour['semester']?> </p>
        <div class=" d-flex justify-content-around">
            <a href="modifier.php?id=<?= $id?>" class="btn btn-primary btn-mg mx-2">Modifier</a>
            <a href="suprimer.php?id=<?=$id?>" onclick="return confirm('voullez vous suprimer <?= $cour['nom_cour']?>')" class="btn btn-danger btn-mg mx-2">suprimer</a>
        </div>
      </div>
    </div>
  </div>

  <?php }?>
</div>

    </div>
</div>
    <script src="script/script.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>