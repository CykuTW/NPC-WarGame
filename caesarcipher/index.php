<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A Web Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css">
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
                        <form method="POST">
                            <h4 class="card-title"><span class="oi oi-wrench"></span> This page is under construction.</h4>
                            <?php if (isset($_POST['password']) && $_POST['password'] === 'I came, I saw, I conquered. This whole sentence is password.'): ?>
                            <p class="card-text">
                                <h5 style="text-align: center;">
                                    <br />
                                    Welcome back, manager.
                                    <br />
                                    <br />
                                    NPC{...}
                                </h5>
                            </p>
                            <?php else: ?>
                            <p class="card-text">
                                <p style="white-space: pre-line;">
                                    If you are manager, enter password to pass.
                                </p>
                                <div class="alert alert-secondary" role="alert">
                                    Hint: Caesar said "Q kium, Q aie, Q kwvycmzml. Bpqa epwtm amvbmvkm qa xiaaewzl."
                                </div>
                                <div class="form-group">
                                    <input type="text" name="password" class="form-control" />
                                </div>
                            </p>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>