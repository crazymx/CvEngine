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

      <?php 
        

        //$cv = new Cv;
        //$cv->getName();

        $cvtest = new Cv([
          'cvid' => '5',
          'name' => 'god',
          'firstname' => 'mx',
          'dob' => '2001-02-08',
          'address' => '3 rue des oiseaux',
          'zipcode' => '75019',
          'city' => 'Paris',
          'country' => 'France',
          'licence' => 'Permis B',
          'hobbies' => 'football'          
          ]);

        $db = new PDO('mysql:host=localhost;dbname=cvmotor', 'root', '');
        $manager = new CvManager($db);
        //$manager->add($cvtest);

        $cvtest->show();

        $cvMx = $manager->getCv(1);
        $cvMx->show();




        $cvList = [];
        $cvList = $manager->getList();
        $len = count($cvList);
        $cvList[$len-1]->show();

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