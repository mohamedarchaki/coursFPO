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
    if(!isset($_SESSION['etudiant'])){
        header("location:etudiant.php");
    }
    ?>
    <div class="container">
    <h2><?php echo $_SESSION['etudiant']['nom']." ".$_SESSION['etudiant']['prenom']; ?></h2>
</div>
    <script src="script/script.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>