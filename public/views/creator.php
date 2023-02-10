<!DOCTYPE html>
<head>
    <link rel="stylesheet" type = "text/css" href = "public/css/style.css">
    <script type = "text/javascript" src="./public/js/headerScript.js"></script>
    <title>Recommendation creator - GameAlike.net</title>
</head>


<body>
    <header id="header"></header>
    <script>insertHeader()</script>


    <form class = "creation-form" action="addRecommendation" method="POST" ENCTYPE="multipart/form-data">
        <h1>Recommendation creator</h1>
        <div class = "rows">
            <div class = "column">

                <input name = "name" class = "input-text-field" type = "text" placeholder = "Game name">

                <input type="file" name="img">
                <?php
                if(isset($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>

                <textarea name = "desc">Game description
                </textarea>

            </div>

            <div class = "column">
                <div class = profile-form-container>
                    <h1>Rate the game: </h1>
                    <label for id="story">story</label>
                    <input name = "story" type="range" min="0" max="100" value="0" class="slider">

                    <label for id="gameplay">gameplay</label>
                    <input name = "gameplay" type="range" min="0" max="100" value="0" class="slider">

                    <label for id="graphics">graphics</label>
                    <input name = "graphics" type="range" min="0" max="100" value="0" class="slider">

                    <label for id="climate">climate</label>
                    <input name = "climate" type="range" min="0" max="100" value="0" class="slider">

                    <label for id="music">music</label>
                    <input name = "music" type="range" min="0" max="100" value="0" class="slider">


                    <button name = "confirm-button" class="button" type="submit">Confirm</button>

            </div>

        </div>
    </form>
</body>