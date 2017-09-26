<?php
    if (isset($_GET['highlight'])) {
        highlight_file(__FILE__);
        exit();
    }

    require_once('db.php');
    if (isset($_POST['username']) && isset($_POST['password'])) {
        //跳脫惡意的單引號
        $username = str_replace("'", "\\'", $_POST['username']);
        $password = str_replace("'", "\\'", $_POST['password']);
        $result = $db->query(sprintf("SELECT * FROM users WHERE username='%s' AND password='%s'", $username, $password));
        if ($result) {
            if ($result->fetch(PDO::FETCH_OBJ)) {
                $islogin = true;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SQL Injection 1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>
<body>
    <div class="container" style="margin-top: 5rem;">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-auto">
                <div class="card">
                    <div class="card-body">
                        <?php if ($islogin): ?>
                            <h3>Welcome, <?=htmlspecialchars($username) ?></h3>
                            <p>Now, you can see the flag: <?=$flag ?></p>
                        <?php else: ?>
                            <form method="POST">
                                <h4 class="card-title">Login</h4>
                                <p class="card-text">
                                    Try to log in without username and password.
                                    <div class="alert alert-secondary" role="alert">
                                        Hint: Here is <a href="/?highlight=1" target="_blank">source code.</a>
                                    </div>
                                    <div class="form-group">
                                        Username: <input type="text" name="username" class="form-control" required />
                                        Password: <input type="password" name="password" class="form-control" required />
                                    </div>
                                </p>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>