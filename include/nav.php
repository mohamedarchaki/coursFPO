<?php session_start();
 ?>


<nav class="navbar navbar-expand-lg bg-body-tertiary z-1" style="background-color: #f9f9f9e0;">
      <div class="container-fluid nav_bar container">
        <a class="navbar-brand" href="#">E-Cour</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse list_ul collapse" id="navbarNav" >
          <ul class="navbar-nav nav__listlinks">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <?php if(isset($_SESSION['user']))
{
?>
        <li class="nav-item">
             <a class="nav-link" href="ajouter_cour.php">Ajouter Cour</a>
        </li>
        <li class="nav-item">
             <a class="nav-link" href="liste_cour.php">liste Cour</a>
        </li>
        <li class="nav-item">
             <a class="nav-link" href="deconnexion.php">Deconnexion</a>
        </li>

<?php } else{ ?>

  <li class="nav-item">
              <a class="nav-link" href="prof.php">Espace Enseignants</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="etudiant.php">Espace Etudiant</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?id=1&ksk=2">Contact</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
  