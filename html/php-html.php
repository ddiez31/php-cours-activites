<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>PHP & HTML</title>
</head>

<body>
    <h1>Liste des élèves</h1>
    <!-- Instructions : Afficher la liste des éléves qui sont présent dans le tableau $students -->
    <?php
        //students
        $students = ['Hulk', 'Iron Man', 'Wonder Woman', 'Black Widow', 'Malicia'];
     ?>
        <ul>
            <?php //display the students here
         foreach($students as $students) {
          echo '<li>'.$students.'<br>';
        }
         ?>
        </ul>
        <hr>
        <h1>Date du jour</h1>
        <form method="POST">
            <!-- Instructions : Créer la liste de jour (en chiffres), de mois (en chiffres) et d'année en PHP. -->
            <label for="day">Day</label>
            <select name="day"><?php //list of day 
        for($i = 1; $i <= 31; $i++) {
            if($i == date(j)) {
              echo '<option selected value="'.date(j).'">'.date(j).'</option>';
          } else {
              echo '<option value="'.$i.'">'.$i.'</option>';
          }
        }

       ?></select>
            <label for="month">Month</label>
            <select name="month"><?php //list of month 
            for($i = 1; $i <= 12; $i++) {
              if($i == date(n)) {
                echo '<option selected value="'.date(n).'">'.date(n).'</option>';
              } else {
                echo '<option value="'.$i.'">'.$i.'</option>';
              }
            }

        ?></select>
            <label for="year">Year</label>
            <select name="year"><?php //list of year 
          for($i = 2010; $i <= 2050; $i++) {
            if($i == date(Y)) {
              echo '<option selected value="'.date(Y).'">'.date(Y).'</option>';
            } else {
              echo '<option value="'.$i.'">'.$i.'</option>';
            }
          }     

        ?></select>
        </form>
        <hr>
        <!-- Instruction : Afficher ce bloc que si dans l'URL il y'a une variable sexe et que ça valeur vaut "fille" -->
        <?php
      $getKey = array_keys($_GET);
      $getValue = array_values($_GET);
      $displayGirl = false;
      $displayBoy = false;
      if ($getKey[0] == 'sexe') {
        if($getValue[0] == 'fille') {
          $displayBoy = false;   
          $displayGirl = true;
        }
        if ($getValue[0] == 'garçon') {
          $displayGirl = false;   
          $displayBoy = true;
        }
      }
        if ($displayGirl) {
        ?>
            <p>
                Je suis une fille
            </p>
            <?php
        }
        ?>
            <!-- Instruction : Afficher ce bloc que si dans l'URL il y'a une variable sexe et que ça valeur vaut "garçon" -->
        <?php
        if ($displayBoy) {
        ?>
            <p>
                Je suis un garçon
            </p>
        <?php
        }
        ?>
            <!-- Instruction : Afficher ce bloc dans les autres cas -->
        <?php
        if (!$displayBoy && !$displayGirl) {
        ?>
            <p>
                Je suis indéfini
            </p>
        <?php
        }
        ?>

        <hr>

    <h1>Inscription newsletter</h1>
    <form method="POST" action="/user.php">
          <label for="name">Email:</label>
          <input type="email" name="email" />
          <button type="submit" name="submit">Inscription</button>
    </form>

    <!-- Ecriture fichier -->
  <?php
    if (isset($_POST['submit'])) {
    $date = date(d.'/'.m.'/'.Y);
    $time = date(H.'\h'.i);
    $mail = $_POST['email'];
    $newsletter = fopen('newsletter.txt', 'a+');
    fputs($newsletter, $date.' à '.$time.': '.$mail.'<br>');                
    fclose($newsletter);
    }
  ?>
 <hr>

    <!-- Lecture fichier -->
<form method="POST" action="/admin.php">
  <button type="submit" name="read">Lire fichier des inscrits</button>
    <button type="submit" name="delete">Effacer fichier des inscrits</button>

  </form>

  <?php
    if (isset($_POST['read'])) {
    $newsletter = fopen('newsletter.txt', 'r');
    if ($newsletter) {
	    while (!feof($newsletter)) {
		    $ligne = fgets($newsletter);
        echo $ligne;
	    }
	  fclose($newsletter);
  } else {
        echo 'Le fichier est vide';
    }
}
?>
    <!-- Suppression fichier -->
<?php
    if (isset($_POST['delete'])) {
    unlink('newsletter.txt');
        echo 'Le fichier est supprimé';
    }
?>

</body>

</html>