<!DOCTYPE html">
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Projet Annuel</title>
  </head>
  
  <body>
  <div id="conteneur">
    <?php include('header.php'); ?>
      
    <h1 id="header"><span>CV Motor Project</span></h1>

       
    <div id="contenu">
      <form action="form_add_cv.php" method="post">
          <input type="submit" value="Add new CV" />
      </form>

      <form action="view_cv.php" method="post">
          <input type="submit" value="View CV" />
      </form>
    </div>
    
    <p id="footer">Made by Mx.</p>
  </div>
  </body>
</html>