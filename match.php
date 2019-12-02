<?php include('include/header.php'); ?>

<?php

  $db = new PDO('mysql:host=localhost;dbname=football_ligue_1','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  $id = $_GET['id'];


  $stmt = $db->prepare('SELECT matchs.*
    FROM matchs
    INNER JOIN teams AS th
    ON team_home.id = matchs.id_team_home
    INNER JOIN teams AS ta
    ON ta.id = matchs.id_team_away
    WHERE ta.id =  ' . $id);
    $stmt->execute();
    $match = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
  <div class="row">
      <div class="col-md-4 mask">
        <div class="card border shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
          <?php echo $match['score_home']?>" <div class="card-img-top" alt="les matchs">
        </div>
      </div>
  </div>
</div>

<?php var var_dump(score_home);?>
<?php include('include/footer.php'); ?>
