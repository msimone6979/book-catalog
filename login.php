<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalogo libri | Login </title>

    <link href="node_modules/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="node_modules/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="node_modules/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="node_modules/gentelella/vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="node_modules/gentelella/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <div class="login_wrapper">

            <div class="form login_form">
                <div class="separator">
                    <div>
                        <h1><i class="fa fa-book"></i> Catalogo Libri</h1>
                    </div>
                </div>
                <section class="login_content">
                    <form role="form" method="POST" action="./authenticate.php">
                        <h1>Accesso al sistema</h1>
                        <div>
                            <input name="username" type="text" class="form-control" placeholder="Username" required="" autofocus />
                        </div>
                        <div>
                            <input name="password" type="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit">Log in</a>
                        </div>
                    </form>
                </section>
                <div class="separator">
                    <p>©<?php echo date('Y') ?> All Rights Reserved. Matteo Simone</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>