<?php
// TODO 1: PREPARING ENVIRONMENT: 1) session 2) functions
$aConfig = require_once 'config.php';
$db = mysqli_connect(
    $aConfig ['host'],
    $aConfig ['user'],
    $aConfig ['pass'],
    $aConfig ['name']
);
session_start();
function renderInfo($db)
{
    $query = 'SELECT * FROM users ';
    $dbResponse = mysqli_query($db, $query);
    $aUsers = mysqli_fetch_all($dbResponse, MYSQLI_ASSOC);
    mysqli_close($db);
    foreach ($aUsers as $user) {
        echo $user ['email'] . ' ';
        echo $user ['password'] . ' ';
        echo $user ['created_at'] . ' ';
        echo '<hr>';
    }
}

// TODO 2: ROUTING
if (empty($_SESSION['auth'])) {
    header('Location: /index.php');
    die;
}

// TODO 3: CODE by REQUEST METHODS (ACTIONS) GET, POST, etc. (handle data from request): 1) validate 2) working with data source 3) transforming data

// TODO 4: RENDER: 1) view (html) 2) data (from php)

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
        <div class="card-header bg-warning text-light">
            Admin
        </div>
        <div class="card-body">

            <!-- TODO: render php data   -->
            <?php
            renderInfo($db);
            ?>

        </div>
    </div>
</div>

</body>
</html>
