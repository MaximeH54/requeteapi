<?php include('include/header.php'); ?>

<?php

  $db = new PDO('mysql:host=localhost;dbname=football_ligue_1','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  $id = $_GET['id'];


  $stmt = $db->prepare('SELECT coachs.*
    FROM coachs
    INNER JOIN coachs_has_teams
    ON coachs.id = coachs_has_teams.id_coach
    INNER JOIN teams
    ON teams.id = coachs_has_teams.id_team
    WHERE coachs.id =  ' . $id);
    $stmt->execute();
    $coach = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
  <div class="row">
      <div class="col-md-4 mask">
        <div class="card border shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
          <img src="<?php echo $coach['photo']?>"> <div class="card-img-top" alt="les coachs">
        </div>
      </div>
  </div>
</div>

<?php var_dump('coachs') ?>
<?php include('include/footer.php'); ?>
