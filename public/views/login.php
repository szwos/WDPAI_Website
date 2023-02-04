<!DOCTYPE html>
<head>
    <link rel="stylesheet" type = "text/css" href = "public/css/style.css">
    <title>login - GameAlike.net</title>
</head>



<body>
    <header class="header">
        <div class="page-name-box">
            <h1>GameAlike.net</h1>
        </div>
    </header> 



    <div class = "input-form-container">
        <form class="login" action="login" method="POST">
            <label for id="email">Email:</label>
            <input name = "email" class = "input-text-field" type = "text" placeholder = "email@email.com">

            <label for id="password">Password:</label>
            <input name = "password" class = "input-text-field" type = "password" placeholder="password">
            <button name = "login-button" class="button" type="submit">LOGIN</button>

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
</body>