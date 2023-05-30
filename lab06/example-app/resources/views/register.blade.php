<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Guestbook</title>

    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- fontawesome  -->
    <script src="https://kit.fontawesome.com/6fca15713e.js" crossorigin="anonymous"></script>

</head>

<body>

<div class="container">

    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container-fluid">

            <!-- logo and link to home page   -->
            <a class="navbar-brand" href="/">
            <span style="color: Dodgerblue;">
                <i class="fa-brands fa-php fa-2xl"></i>
            </span>
            </a>

            <!-- navbar small button collapse menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- menu -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (!empty($_SESSION['auth'])) { ?>
                        <li class="nav-item">
                            <a href="/admin" class="nav-link active" aria-current="page">Admin</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/guestbook">GuestBook</a>
                        </li>

                    <?php } ?>
                </ul>

                <ul class="navbar-nav navbar-right">
                    <?php if (!empty($_SESSION['auth'])) { ?>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link active" aria-current="page">Logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="/register" class="nav-link active" aria-current="page" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="/login" class="nav-link active" aria-current="page" href="#">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

        </div>
    </nav>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-success text-light">
            Register form
        </div>
        <div class="card-body">
            <form method="post">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email"/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password"/>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="formRegister"/>
                </div>
            </form>

            <!-- TODO: render php data   -->
            <?php
//            if ($arguments['infoMessage']) {
//                echo '<hr/>';
//                echo "<span style='color:red'>{$arguments['infoMessage']}</span>";
//            }
            ?>

        </div>

    </div>
</div>

</body>
</html>
