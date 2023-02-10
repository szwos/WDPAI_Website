<!DOCTYPE html>
<head>
    <link rel="stylesheet" type = "text/css" href = "public/css/style.css">
    <script type = "text/javascript" src="./public/js/headerScript.js"></script>
    <title>Recommendations - GameAlike.net</title>
</head>


<body>
<header id="header"></header>
<script>insertHeader()</script>

    <div class = "recommendations-label">Browse recommendations:</div>
    <section class = "recommendations">
        <?php
        if(isset($recommendations)) print_r("jest set"); else print_r("nie jest set");
        require_once __DIR__."/../../src/models/Recommendation.php";
        foreach ($recommendations as $recommendation){
            echo "<div id = ".$recommendation->getOwnerId().">";
                echo "<img src  = 'public/uploads/".$recommendation->getImg()."'>";
                    echo "<div class = 'recommendations-content-short'>";
                        echo "<h2>".$recommendation->getName()."</h2>";
                        echo "<p>".$recommendation->getDesc()."</p>";
                    echo "</div>";
                echo "</div>";
        }  ?>

    </section>


</body>