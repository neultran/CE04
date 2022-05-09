<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$capName = htmlentities($_POST['CapName']);
$capName = strtolower($capName);
$capName = ucwords($capName);
$capAge = $_POST['CapAge'];
$ShipName = $_POST['ShipName'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <?php
                        $pos = 0;
                        print("<p class ='title'>Captain $capName at the age of $capAge took over the Ship $ShipName " . "and here is some of their past: </p>");

                        $earlyFile = fopen("EarlyYears.txt", "r") or die("Unable to open file");

                        while(!feof($earlyFile)){

                          $randomEarly[$pos] = fgets($earlyFile);
                          $pos++;
                        }
                   fclose($earlyFile);

                      shuffle($randomEarly);
                      print("<p>Their early career started with: <ul><li>" . $randomEarly[0] . "</li><li>" . $randomEarly[1] . "</li></ul></p>");

                      if($capAge > 25)
                      {
                        $tours = 4 + ($capAge - 26);
                      }
                      else{
                        $tours = floor(($capAge - 17) / 2);
                      }
                      $randomTours = explode("\n", file_get_contents("Tours.txt"));

                        shuffle($randomTours);
                        print("<p>Their career now looks like this: <ul>");
                        for($y = 0; $y < $tours; $y++)
                        {
                            print("<li>" . $randomTours[$y] . "</li>");
                        }
                        print("</ul></p>");
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
