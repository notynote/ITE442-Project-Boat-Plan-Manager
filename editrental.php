<?php

require_once('connections.php');
require('checksession.php');

$rentid = $_POST['rentid'];
$passengerid = trim($_POST['passengerid']);
$tripid = trim($_POST['tripid']);
$fullset = trim($_POST['fullset']);
$mask = trim($_POST['mask']);
$regulator = trim($_POST['regulator']);
$divecom = trim($_POST['divecom']);
$fins = trim($_POST['fins']);
$wetsuit = trim($_POST['wetsuit']);
$bcd = trim($_POST['bcd']);

$sql = "UPDATE empchann_ntcdivedb.equiprental SET passengerid='{$passengerid}',tripid='{$tripid}',fullset='{$fullset}',mask='{$mask}',regulator='{$regulator}',divecom='{$divecom}',fins='{$fins}',wetsuit='{$wetsuit}',bcd='{$bcd}' WHERE rent_id='$rentid'";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <title>Edit Rental</title>
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
                        <h2>Edit Rental</h2>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <?php
                        if($conn->query($sql) == TRUE){
                            echo "<div id='message'>Edit Rental successfully <hr/>Please wait to redirect...</div>";
                            echo "<meta http-equiv='refresh' content='0;url=viewtrip.php?id=$tripid'>"; 
                        } else {
                            echo "<div id='message'>Error: " . $sql . "<br>" . $conn->error ."<hr/>Please wait to redirect...</div>";
                            echo "<meta http-equiv='refresh' content='5;url=viewtrip.php?id=$tripid'>"; 
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php $conn->close(); ?>
</div>

    <!-- get css script  -->
    <?php require 'linkscriptbody.php'; ?>

</body>
</html>
