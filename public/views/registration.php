<!DOCTYPE html>
<head>
    <link rel="stylesheet" type = "text/css" href = "public/css/style.css">
    <title>register - GameAlike.net</title>
</head>


<body>
    <header class = "header">
        <div class =  "page-name-box">
            <h1>GameAlike.net</h1>
        </div>
    </header>
        
    <div class = "rows">
        <div class = "column">
            <div class = "input-form-container">
                <form class = "registration" action="registration" method="POST">

                    <label for id="name">Name:</label>
                    <input name = "name" class = "input-text-field" type = "text" placeholder = "your name">

                    <label for id="surname">Surname:</label>
                    <input name = "surname" class = "input-text-field" type = "text" placeholder = "your surname">

                    <label for id="email">Email:</label>
                    <input name = "email" class = "input-text-field" type = "text" placeholder = "email@email.com"> 
                    
                    <label for id="password">Password:</label>
                    <input name = "password" class = "input-text-field" type = "password" placeholder="password">

                    <label for id="password-repeat">Repeat password</label>
                    <input name = "password-repeat" class = "input-text-field" type = "password" placeholder = "password">

                    <button name = "registration-button" class="button" type="submit">REGISTER</button>

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
        
        <div class = "column">
            javascript trait selection
        </div>
        
    </div>
</body>