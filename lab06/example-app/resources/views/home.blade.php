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

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/guestbook">GuestBook</a>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-right">

                    <li class="nav-item">
                        <a href="/register" class="nav-link active" aria-current="page" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link active" aria-current="page" href="#">Login</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <br>

    <!-- guestbook section -->
    <div class="card card-primary">
        <div class="card-header bg-primary text-light">
            Home page
        </div>
        <div class="card-body">

            <!-- TODO: render php data   -->
            <form method="POST" >
                @csrf
                <label for="search">Search:</label>
                <input type="text" class="form-control" id="search" name="search"><br><br>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>

            <br>


            @if(is_array($data))
                @foreach($data as $row)
                    <a class='link-primary' href="{{$row["link"]}}">{{$row["title"]}}</a><br>
                    {{$row["snippet"]}}<br>
                    <hr>
                @endforeach
            @endif

        </div>
    </div>
</div>

</body>
</html>
