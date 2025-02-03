<?php 
    $id=$_GET['id'];
    require_once 'include/base_donner.php';
    $sqlStat=$pdo->prepare('DELETE FROM cour WHERE id=?');
    $sqlStat->execute([$id]);
    header('location: liste_cour.php')

?>