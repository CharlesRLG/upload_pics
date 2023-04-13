<?php
                // Envoi fichier php

                //$_FILES réception les fichier


                // si mon image exite et que error = 0
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0){

                    //variable qui sera réécrite en cas de succé
                    $error = 1;

                    // si la taille est inférieur à 3mo
                    if ($_FILES['image']['size'] <= 3000000){

                        // vérifier les info de l'image
                        $informationImage = pathinfo($_FILES['image']['name']);

                        //dans le tableau $informationImage la colonne extension
                        $extentionImage = $informationImage['extension'];

                        //tableau d'extension possible pour les images
                        $extensionArray = array('png', 'gif', 'jpg', 'jpeg');

                        // vérifie si l'extension est contenu dans le tableau d'extension
                        if(in_array($extentionImage, $extensionArray)) {

                            // adresse de l'image
                            $address =  'uploads/' . time() . rand() . rand() . '.' . $extentionImage;

                            // déplace et renome l'image
                            move_uploaded_file($_FILES['image']['tmp_name'], $address);
                            echo 'Envoi bien réussi !';
                            
                            // réécriture de la variable
                            $error = 0;


                        }

                    }

                }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>hébergeur D'image</title>
    </head>
    <style type="text/css">
        html, body { margin: 0; font-family: Georgia, 'Times New Roman', Times, serif;}
        header { text-align: center; color: white; background: red;}
        section {margin-top: 50px;background: #f7F7F7; text-align: center; padding: 30px;}
        button { margin: auto; margin-top: 10px; margin-bottom: 10px;}
        .contener { width: 1000px; margin: auto;}
        h1 {margin-top: 0; text-align: center;}
        #image { max-width: 100px;}
        #presentationImage { text-align: center; }
    </style>
    <body>

        <?php include("src/header.php") ?>

        <section>
            <form action="http://localhost/cour_php/upload_pics">
                <button type="submit">Retour</button>
            </form>
        </section>

        <section>
            

                <!-- // enctype=multipart/form-data permet de prevenir pour stocker des image/fichier. -->

                <form method="post" action="hebergeur.php" enctype="multipart/form-data">
                
                        <p>
                            <h1>Héberger une image</h1>
                            <input type="file" required name="image" /><br />
                            <button type="submit">Héberger</button>
                        </p>

                </form>

                <?php
                    // si $error existe et que $error = 0
                    if(isset($error) && $error == 0){

                        // affiche l'image ainsi que son chemin
                        echo
                            ' <div id="presentationImage"> <img src= "' . $address . '" id="image" /><br />

                            <input type="text" value="http://localhost/'. $address.'" />
                            
                            </div> ' 
                        ;

                    } else if(isset($error) && $error == 1) {

                        echo'Votre image ne peut pas être envoyée. Vérifiez son extension et sa taille ( 3 mo maximum )';

                    }
                ?>

        </section>

        <?php include("src/footer.php") ?>

    </body>
</html>