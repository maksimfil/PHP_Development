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

    <!-- navbar menu -->
    <!-- navigation block -->
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

    <!-- guestbook section -->
    <div class="card card-primary">
        <div class="card-header bg-primary text-light">
            Guestbook form
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-6">

                    <!-- form -->
                    <form method="post" name="form" class="fw-bold">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                   aria-describedby="emailHelp" placeholder="Enter email">
                            @if(isset($infoMessage))
                                <p style="color: red" >{{$infoMessage}}</p>
                            @else
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone
                                    else.</small>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputName"
                                   placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputText">Text</label>
                            <textarea name="text" class="form-control" id="exampleInputText"
                                      placeholder="Enter text"
                                      required></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Send">
                        </div>
                    </form>
                    <br>
                </div>

                <!-- TODO: render php data   -->


            </div>
        </div>
    </div>

    <br>

    <div class="card card-primary">
        <div class="card-header bg-body-secondary text-dark">
            Сomments
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">

                    <!-- TODO: render php data   -->
                    @foreach($data as $row)
                        {{$row->name}} <br>
                        {{$row->email}}<br>
                        {{$row->text}} <br>
                        <hr>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
