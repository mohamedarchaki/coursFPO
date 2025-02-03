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
    <?php if(!isset($_SESSION['user'])){
    }
    ?>
    <?php 
        if(isset($_POST['ajouter'])){
            $nom_cour=$_POST['nom_cour'];
            $id_prof=$_SESSION['user']['id'];
            $semester=$_POST['semester'];
            $filier=$_POST['filier'];

        
    if(!empty($id_prof) && !empty($nom_cour) && !empty($semester) && !empty($filier)){
        if(isset($_FILES['file_cour'])){
            $fille= uniqid().$_FILES['file_cour']['name'];
            move_uploaded_file($_FILES['file_cour']['tmp_name'],'fileCour/'.$fille);
        }

        require_once 'include/base_donner.php';
        $sqlStat=$pdo->prepare('INSERT INTO cour (nom_cour,id_prof,semester,filier,file_name) value(?,?,?,?,?)');
        $sqlStat->execute([$nom_cour,$id_prof,$semester,$filier,$fille]);
    }
}
    ?>
    <div class="add_cours" style="background-color: #f9f9f9e0;">
            <div class="container px-1  mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-4 col-11 text-center">
           <div class="card">
                <h5 class="text-center mb-4">Hello Mr <?= $_SESSION['user']['login'] ?></h5>

                <form class="form-card text-start" method="post" enctype="multipart/form-data">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                             <label class="form-control-label px-3">Nom cour :</label>
                             <input type="text" name="nom_cour" placeholder="Enter le nom cour"> </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                             <label class="form-control-label px-3">Nom de prefesseur</label>
                             <input type="text" name="nom_prof" value='<?= $_SESSION['user']['login'] ?>' placeholder="Enter la filier "> </div>
                        </div>

                    <div class="row justify-content-between text-left">
                    <div class="form-group col-sm-6 flex-column my-2 d-flex">
                    <label class="form-control-label px-3 ">choiser le fichier de coure :</label>
                                <select class="form-select " name="semester" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">S1</option>
                                    <option value="2">S2</option>
                                    <option value="3">S3</option>
                                    <option value="4">S4</option>
                                    <option value="5">S5</option>
                                    <option value="6">S6</option>
                                </select>
                            </div>
                            <div class=" form-group col-sm-6 flex-column my-2 d-flex">
                            <label class="form-control-label px-3">choiser le fichier de coure :</label>
                                <select class="form-select " name="filier" id="floatingSelect" aria-label="Floating label select example">
                                    <option selected>Open this select menu</option>
                                    <option value="SMI">SMI</option>
                                    <option value="PC">PC</option>
                                    <option value="IA">IA</option>
                                    <option value="GPCA">GPCA</option>
                                    <option value="LEA">LEA</option>
                                </select>
                            </div>
                    </div>

                    <div class="row justify-content-between text-left mt-2">
                        <div class="form-group col-12 flex-column d-flex">
                             <label class="form-control-label px-3">choiser le fichier de coure :</label>
                             <input class="form-control" name="file_cour" type="file" id="formFile">
                    </div>

                    <div class="row m-3">
                        <button name="ajouter" class="btn btn-primary w-100 btn-lg btn-block" type="submit">Ajouter cour</button>
                         
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
    <script src="script/script.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>