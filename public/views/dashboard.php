<!DOCTYPE html>
<head>
    <link rel="stylesheet" type = "text/css" href = "public/css/style.css">
    <script type = "text/javascript" src="./public/js/headerScript.js"></script>
    <title>dashboard - GameAlike.net</title>
</head>


<body>
<header id="header"></header>
<script>insertHeader()</script>

<div class = "create-recommendation-button">
    <form action="creator" method="POST">
        <input type = "submit" class = "button" value = "Create recommendation">
    </form>
</div>

<div class = "recommendations-label">Browse recommendations:</div>
<section class = "recommendations">
    <?php
    require_once __DIR__ . "/../../src/models/Recommendation.php";
    foreach ($recommendations as $recommendation) {
        echo "<div id = " . $recommendation->getOwnerId()."class = 'recommendation-element'>";
            echo "<div class = rows>";
                echo "<div class = lColumn>";
                    echo "<form action='recommendation_show' method = 'POST'>";
                        echo "<div class = 'section-img'>";
                            echo "<input type='image' src  = 'public/uploads/".$recommendation->getImg()."' >";
                        echo "</div>";
                            echo "<input type='hidden' name='recommendation' value='".$recommendation->getId()."'>";
                    echo "</form>";
                echo "</div>";
                echo "<div class = rColumn>";
                    echo "<div>";
                        echo "<h2>".$recommendation->getName()."</h2>";
                        echo "<p>".$recommendation->getDesc()."</p>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    }  ?>
</section>
</body>
