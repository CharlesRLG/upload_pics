<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>hébergeur D'images</title>
    </head>
    <style type="text/css">
        html, body { margin: 0; font-family: Georgia, 'Times New Roman', Times, serif;}
        header { text-align: center; color: white; background: red;}
        section {margin-top: 50px;background: #f7F7F7; text-align: center; padding: 30px;}
        button { margin: auto; margin-top: 10px; margin-bottom: 10px;}
        .contener { width: 1000px; margin: auto;}
        h1 {margin-top: 0;}
    </style>
    <body>

        <?php include("src/header.php") ?>
        <div class="contener">
            <section>
                <h1>Pour héberger votre image :</h1>
                <form action="http://localhost/cour_php/upload_pics/hebergeur.php">
                    <button type="submit">Cliquer ici !</button>
                </form>
            </section>
        </div>

        <?php include("src/footer.php") ?>

    </body>
</html>