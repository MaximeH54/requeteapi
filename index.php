<?php include('include/header.php'); ?>

<?php
  $db = new PDO('mysql:host=localhost;dbname=football_ligue_1','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  $stmt = $db->prepare('SELECT * FROM teams');
  $stmt->execute();
  $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
  <div class="row hidden-md-up">
    <?php foreach ($teams as $team)  { ?>
      <div class="col-md-4">
        <div class="card border shadow-lg p-3 mb-5 bg-white rounded" style="height: 38rem; width: 18rem;">
          <img src="<?php echo $team['logo']?>" class="card-img-top" alt="les équipes">
          <div class="card-body">
            <h5 class="card-title">
              <a href="team.php?id=<?php echo $team['id']?>"><?php echo $team['name']; ?></a>
            </h5>
            <p class="card-text"><strong>Date de création : </strong><?php echo $team['fundation_date']?></p>
            <p class="card-text"><strong>Président du club : </strong><?php echo $team['president']?></p>
            <p class="card-text"><strong>Stadium: </strong><?php echo $team['name']?></p>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php include('include/footer.php'); ?>
