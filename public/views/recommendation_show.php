<!DOCTYPE html>
<head>
    <link rel="stylesheet" type = "text/css" href = "public/css/style.css">
    <script type = "text/javascript" src="./public/js/headerScript.js"></script>
    <title>Recommendation creator - GameAlike.net</title>
</head>


<body>
<header id="header"></header>
<script>insertHeader()</script>

    <div class = "content">

        <div class = "title_recommendation">
            <h1><?php echo $recommendation[0] ?></h1>
            <p>author: <?php echo $recommendation[1]." ".$recommendation[2] ?> </p>
        </div>


        <div class = "infos_recommendation">
            <img src  = 'public/uploads/<?php echo $recommendation[3] ?>'>
            <div class = "show_profile">
                <label for id="story">story</label>
                <input name = "story" type="range" min="0" max="100" value="<?php echo $recommendation[4] ?>" class="slider" disabled>

                <label for id="gameplay">gameplay</label>
                <input name = "gameplay" type="range" min="0" max="100" value="<?php echo $recommendation[5] ?>" class="slider" disabled>

                <label for id="graphics">graphics</label>
                <input name = "graphics" type="range" min="0" max="100" value="<?php echo $recommendation[6] ?>" class="slider" disabled>

                <label for id="climate">climate</label>
                <input name = "climate" type="range" min="0" max="100" value="<?php echo $recommendation[7] ?>" class="slider" disabled>

                <label for id="music">music</label>
                <input name = "music" type="range" min="0" max="100" value="<?php echo $recommendation[8] ?>" class="slider" disabled>
            </div>
        </div>
        <div clas = "description_text">
            <?php echo $recommendation[9] ?>
        </div>

    </div>
</body>