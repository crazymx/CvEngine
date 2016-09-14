<!DOCTYPE html">
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Projet Annuel</title>
  </head>
  
  <body>
  <div id="conteneur">
    <?php include('header.php'); ?>
    <h2 id="header"><span>CV Motor Project</span></h2>
       
    <div id="contenu">

      <?php 
        $db_host = 'localhost';
        $db_name = 'cvmotor';
        $db_login = 'root';
        $db_pw = '';
        //$db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8', $db_login, $db_pw);
        

        //$cv = new Cv;
        //$cv->getName();

        $cvtest = new Cv([
          'cvid' => '1',
          'name' => 'Dupont',
          'firstname' => 'Jean',
          'dob' => '2001-02-08',
          'address' => '3 rue des oiseaux',
          'zipcode' => '75019',
          'city' => 'Paris',
          'country' => 'France',
          'licence' => 'Permis A',
          'hobbies' => 'football'          
          ]);


        
        $db = new PDO('mysql:host=localhost;dbname=cvmotor', 'root', '');
        $manager = new CvManager($db);

        //$manager->update($cvtest);
        //$manager->add($cvtest);
        //$cvtest->show();
        //$cvMx = $manager->getCv(1);
        //$cvMx->show();
        //$manager->delete($cvList[2]);

        

      ?>

      <form action="form_add_cv.php" method="post">
          <input type="submit" value="Add new CV" />
      </form>
      <form action="view_cv.php" method="post">
          <input type="submit" value="View CV" />
      </form>
    </div>
    
    <!--<p id="footer">Made by Mx.</p>-->
  </div>
  </body>
</html>