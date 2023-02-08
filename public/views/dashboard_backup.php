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

<div class = "rows">
    <div class = "column">

        <form action="creator" method="POST">
            <input type = "submit" class = "button" value = "Create recommendation">
        </form>

        <form action="recommendations">
            <input type = "submit" class = "button" value = "Browse recommendations">
        </form>

    </div>

    <div class = "column">
        <div class = profile-form-container>
            <form class = "profileRegistration" action="dashboard" method="POST">
                <h1>Choose traits that determine what does it mean to You, that a game is similliar</h1>
                <label for id="story">story</label>
                <input name = "story" type="range" min="0" max="100" value="<?php if(isset($values)) {echo $values[0];} else {echo "0";} ?>" class="slider">

                <label for id="gameplay">gameplay</label>
                <input name = "gameplay" type="range" min="0" max="100" value="<?php if(isset($values)) {echo $values[1];} else {echo "0";} ?>" class="slider">

                <label for id="graphics">graphics</label>
                <input name = "graphics" type="range" min="0" max="100" value="<?php if(isset($values)) {echo $values[2];} else {echo "0";} ?>" class="slider">

                <label for id="climate">climate</label>
                <input name = "climate" type="range" min="0" max="100" value="<?php if(isset($values)) {echo $values[3];} else {echo "0";} ?>" class="slider">

                <label for id="music">music</label>
                <input name = "music" type="range" min="0" max="100" value="<?php if(isset($values)) {echo $values[4];} else {echo "0";} ?>" class="slider">

                <button name = "confirm-button" class="button" type="submit">Confirm</button>

                <div class = "messages">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>

            </form>
        </div>
    </div>

</div>
</body>