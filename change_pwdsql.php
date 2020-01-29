<?php
    require_once('connections.php');
    require('checksession.php');

$userid = trim($_POST['userid']);
$password = trim($_POST['pwd']);
$hashpassword = password_hash($_POST['pwd'], PASSWORD_BCRYPT);

$sql = "UPDATE empchann_ntcdivedb.account SET password='{$password}' WHERE userid='$userid'";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
    <!-- Get Css -->
    <?php require 'linkcsshead.php'; ?>
</head>
<body>
<?php require 'navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table width="100%" cellpadding="5" cellspacing="5">
                    <tr>
                        <td>
                            <h2>Edit Password</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <?php
                                // If insert data successfully, show information and redirect to main.php
                                if($conn->query($sql) == TRUE){
                                    echo "<div id='message'>Edit Customer Room successfully <hr/>Please wait to redirect...</div>";
                                    echo "<meta http-equiv='refresh' content='0;url=main.php'>"; // Redirect to index.php
                            } else {
                                    echo "<div id='message'>Error: " . $sql . "<br>" . $conn->error ."<hr/>Please wait to redirect...</div>";
                                    echo "<meta http-equiv='refresh' content='10;url=main.php'>"; // Redirect to main.php
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    <?php $conn->close(); ?>

    <!-- get css script  -->
    <?php require 'linkscriptbody.php'; ?>
</body>
</html>