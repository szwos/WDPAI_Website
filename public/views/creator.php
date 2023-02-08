<!DOCTYPE html>
<head>
    <link rel="stylesheet" type = "text/css" href = "public/css/style.css">
    <title>Recommendation creator - GameAlike.net</title>
</head>


<body>
    <header class = "header">
        <div class =  "page-name-box">
            <h1>GameAlike.net</h1>
        </div>
    </header>


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

                <!--uploaded image -->
            </div>

            <div class = "column">
                <textarea name = "desc">Game description
                </textarea>

                <input type = "submit" class = "button" value = "Continue">
            </div>

        </div>
    </form>
</body>