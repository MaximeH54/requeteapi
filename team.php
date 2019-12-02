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
  ?>

<div class="container">
  <div class="row">
    <?= $team['name']; ?>
    <a href="coach.php?id=<?php echo $team['coach_id']; ?>">
      <?= $team['coach']; ?>
    </a>
  </div>
</div>


<?php var_dump($_GET['id']); ?>

<?php include('include/footer.php'); ?>
