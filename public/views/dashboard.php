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

        <form action="recommendation_form">
            <input type = "submit" class = "button" value = "Find game like">
        </form>

    </div>

    <div class = "column">
        <div class = profile-form-container>
            <form class = "profileRegistration" action="dashboard" method="POST">
                <h1>Choose traits that determine what does it mean to You, that a game is similliar</h1>
                <label for id="story">story</label>
                <input name = "story" type="range" min="0" max="100" value="50" class="slider">

                <label for id="gameplay">gameplay</label>
                <input name = "gameplay" type="range" min="0" max="100" value="50" class="slider">

                <label for id="graphics">graphics</label>
                <input name = "graphics" type="range" min="0" max="100" value="50" class="slider">

                <label for id="climate">climate</label>
                <input name = "climate" type="range" min="0" max="100" value="50" class="slider">

                <label for id="music">music</label>
                <input name = "music" type="range" min="0" max="100" value="50" class="slider">

                <button name = "confirm-button" class="button" type="submit">Confirm</button>

            </form>
        </div>
    </div>

</div>
</body>