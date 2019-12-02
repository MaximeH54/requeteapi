<?php include('include/header.php'); ?>

<?php

  $db = new PDO('mysql:host=localhost;dbname=football_ligue_1','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

  $id = $_GET['id'];


  $stmt = $db->prepare('SELECT teams.*, coachs.id AS coach_id, coachs.name AS coach, stadiums.name AS stadium
    FROM teams
    INNER JOIN coachs_has_teams
    ON teams.id = coachs_has_teams.id_team
    INNER JOIN coachs
    ON coachs_has_teams.id_coach = coachs.id
    INNER JOIN stadiums
    ON stadiums.id = teams.id_stadium
    WHERE teams.id = ' . $id);
  $stmt->execute();
  $team = $stmt->fetch(PDO::FETCH_ASSOC);


  $stmt = $db->prepare('SELECT players.*, name
    FROM players
    INNER JOIN player_has_team
    ON teams.id = player_has_team.id_players
    INNER JOIN coachs
    ON coachs_has_teams.id_coach = coachs.id
    WHERE teams.id = ' . $id);
  $stmt->execute();
  $players = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $stmt = $db->prepare('SELECT matchs.*
    FROM matchs
    INNER JOIN teams AS th
    ON team_home.id = matchs.id_team_home
    INNER JOIN teams AS ta
    ON ta.id = matchs.id_team_away
    WHERE ta.id =  ' . $id);
  $stmt->execute();
  $matchs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container text-center">
  <h1 class="font-weight-bold"><?= $team['name']; ?></h1>
  <div class="row">
    <img src="<?php echo $team['logo']?>" class="card-img-top rounded mx-auto d-block"style="width: 35rem;" alt="les équipes">
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">President : </th>
      <th scope="col"><?php echo $team['president']; ?></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col">Date de fondation : </th>
      <th scope="col"><?php echo $team['fundation_date']; ?></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col">Entraineur : </th>
      <th scope="col"><a href="coach.php?id="><?php echo $team['coach']; ?></a></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col">Stade : </th>
      <th scope="col"><?php echo $team['name']?></th>
    </tr>
  </thead>
</table>
  </div>
</div>



<style>
</style>



<?php include('include/footer.php'); ?>
