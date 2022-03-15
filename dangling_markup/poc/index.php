<?php
// setup CSP
// header("Content-Security-Policy: default-src 'none'");
?>

<html>
    <head>
        <title>CSP bypass - Dangling markup</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta charset="utf-8" />
    </head>
    <body>
        
        <div id="main">

            <form method="POST" action=".">

                <p>
                    Welcome 
                    <?php
                    // INJECTION GOES HERE
                    if (isset($_GET['name']) && !empty($_GET['name'])) {
                        echo $_GET['name'];
                    } else {
                        echo "anonymous ;)";
                    }
                    ?>
                </p>
                
                <input type='text' name='token' value='random_nounce_to_keep_secret' hidden>
                <input type="submit">
            </form>

        </div>

    </body>
</html>