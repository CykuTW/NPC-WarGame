<?php

require_once('flag.php');
require_once('hashmap.php');

if (!isset($_POST['data']))
    $_POST['data'] = '{"a":1,"b":2}';

if (is_string($_POST['data'])) {
    $json = json_decode($_POST['data'], false, 2);
    if ($json) {
        $map = new MyHashMap();
        try {
            foreach ($json as $key => $value)
                $map->put((string) $key, $value);
            $result = $map->dump();
        } catch (RuntimeException $e) {
            $result = "Oops, someting is wrong.\nPlease contact Website Manager with this code: " . $flag;
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
    <title>My HashMap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" style="margin-top: 3rem;">
        <div class="row justify-content-md-center">
            <div class="col-md-8 col-md-auto">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">My HashMap</h3>
                        <div class="card-text">
                            <p>Hello, I'm a student and I just completed the Data Structure Course at my school. So I made this to understand HashMap.</p>
                            <p>Hope you like it, and please tell my if you found any bugs.</p>
                            <hr />
                            <form method="POST">
                                <div class="form-group">
                                    <h5>Input Data:</h5>
                                    <textarea class="form-control" name="data" rows="5">{
    "a": 1,
    "b": 2
}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <br />
                            <?php if (is_string($result)): ?>
                                <h5>HashMap Result:</h5>
                                <pre><?=htmlspecialchars($result) ?></pre>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>