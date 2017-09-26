<?php require_once('db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" style="margin-top: 5rem;">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-auto">
                <div class="card">
                    <div class="card-body">
                        <?php $result = $db->query("SELECT * FROM news WHERE id='".$_GET['id']."' limit 1"); ?>
                        <?php if ( $result ): ?>
                            <?php if ($row = $result->fetch(PDO::FETCH_OBJ) ): ?>
                                <h4 class="card-title"><?=$row->title ?></h4>
                                <p class="card-text"><?=$row->content ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                        <a href="/" class="btn btn-primary">Back to list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>