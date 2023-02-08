<!DOCTYPE html>
<head>
    <link rel="stylesheet" type = "text/css" href = "public/css/style.css">
    <title>dashboard - GameAlike.net</title>
</head>


<body>
    <header class = "header">
        <div class =  "page-name-box">
            <h1>GameAlike.net</h1>
        </div>
    </header>


    <form action="creator" method="POST">
        <input type = "submit" class = "button" value = "Create recommendation">
    </form>

    <div class = "recommendations-label">Browse recommendations:</div>
        <section class = "recommendations">
            <?php
            require_once __DIR__."/../../src/models/Recommendation.php";
            foreach ($recommendations as $recommendation) {
                echo "<div id = ".$recommendation->getOwnerId().">";
                echo "<img src  = 'public/uploads/".$recommendation->getImg()."'>";
                echo "<div>";
                echo "<h2>".$recommendation->getName()."</h2>";
                echo "<p>".$recommendation->getDesc()."</p>";
                echo "</div>";
                echo "</div>";
            }  ?>

        </section>


</body>