<?php
session_start(); ?>

<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="style.css">
  <script src="traitement.js"></script>
	<title>Quiz</title> 
</head>
<body>

<div class="quiz">
  <img src="quiz.png" alt="quiz">
</div>
  <h1>Merci de remplir ce formulaire :</h1>

  <?php //probleme de couleur

if (isset($_SESSION['erreur'])) {
      echo '<p>', $_SESSION['erreur'], '</p>';
  } else {
      if (isset($_SESSION['erreurP'])) {
          echo '<p>', $_SESSION['erreurP'], '</p>';
      }
      if (isset($_SESSION['erreurN'])) {
          echo '<p>', $_SESSION['erreurN'], '</p>';
      }
      if (isset($_SESSION['erreurE'])) {
          echo '<p>', $_SESSION['erreurE'], '</p>';
      }
  } ?>
  
 
    
        <form method="POST" action="traitement.php"  onsubmit="return checkSubmit()">
                       
          <label for="prenom">Prénom* : </label><br>
          <input type="text" id="prenom" name="prenom" ><br><br>
          <label for="nom">Nom* : </label><br>
          <input type="text" id="nom" name="nom" ><br><br>
          <label for="email">eeee-Mail* : </label><br>
          <input type="text" id="email" name="email" ><br><br>
          *Champs obligatoires

          <div class="quiz">

            <div class="question">
              Combien y a-t-il de carrés ?
              <img class="images" src="carres.png">
              <select name="carres">
               <option value=""> -</option>
               <option value="37"> 37</option>
               <option value="40"> 40</option>
               <option value="42"> 42</option>
               <option value="38"> 38</option>
              </select>
                 
            </div>        

            <div class="question">
              Les lignes horizontales sont-elles parallèles ?
              <img class="images" src="horizontaux.png">
              <div class="bradio">
                <input type="radio" name="horizontaux" value="Oui">
                <label for="html">Oui</label><br>
                <input type="radio" id="css" name="horizontaux" value="Non">
                <label for="css">Non</label><br>
                  
              </div>
            </div> 
          </div>         
               
          <input type="submit" value="Vérifier" onclick="popUp()">
          <input type="reset" value="effacer les réponses">

        </form>

</body>
</html>


<?php session_destroy();

?>
