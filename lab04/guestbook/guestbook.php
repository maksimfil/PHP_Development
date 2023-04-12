<?php
// TODO in PHP part
$aConfig = require_once 'config.php';
$db = mysqli_connect(
    $aConfig ['host'],
    $aConfig ['user'],
    $aConfig ['pass'],
    $aConfig ['name']
);
function renderInfo($db)
{
    $query = 'SELECT * FROM comments ';
    $dbResponse = mysqli_query($db, $query);
    $aComments = mysqli_fetch_all($dbResponse, MYSQLI_ASSOC);
    mysqli_close($db);
    foreach ($aComments as $comment) {
        echo $comment ['name'] . ' ';
        echo $comment ['email'] . ' ';
        echo $comment ['text'] . ' ';
        echo $comment ['date'] . ' ';
        echo '<hr>';
    }
}

if (isset($_POST["inputEmail"])) {
    $inputEmail = htmlspecialchars($_POST["inputEmail"]);
    $inputName = htmlspecialchars($_POST["inputName"]);
    $inputText = htmlspecialchars($_POST["inputText"]);
    $inputDate = htmlspecialchars($_POST["inputDate"]);
    echo 'sdfsdf';
    $query = "INSERT INTO comments (email, name, text, date) VALUES (
'" . $inputEmail . "',
'" . $inputName . "',
'" . $inputText . "',
'" . $inputDate . "'
)";
    mysqli_query($db, $query);
    mysqli_close($db);
}
session_start();
?>

<!DOCTYPE html>
<html>

<?php require_once 'sectionHead.php' ?>

<body>

<div class="container">
    <!-- navbar menu -->
    <?php require_once 'sectionNavbar.php' ?>
    <br>
    <!-- guestbook section -->
    <div class="card card-primary">
        <div class="card-header bg-primary text-light">
            GuestBook form
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-6">

                    <!-- TODO: create guestBook html form   -->
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail"
                                   aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" pattern="^[^0-9]*$" class="form-control" id="inputName" name="inputName"
                                   placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="inputText">Text</label>
                            <input type="text" class="form-control" id="inputText" name="inputText" placeholder="Text"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="inputDate">Date</label>
                            <input type="datetime-local" class="form-control" id="inputDate" name="inputDate"
                                   placeholder="Date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
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
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="admin.php">Admin Page</a></li>
                        <li class="page-item"><a class="page-link" href="login.php">Login Page</a></li>
                        <li class="page-item"><a class="page-link" href="logout.php">Logout Page</a></li>
                        <li class="page-item"><a class="page-link" href="register.php">Register Page</a></li>
                    </ul>

                    <!-- TODO: render guestBook comments   -->
                    <?php
                    renderInfo($db);
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
