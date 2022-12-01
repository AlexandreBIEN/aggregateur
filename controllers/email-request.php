<?php
session_start();

if(isset($_GET['email']) && !empty($_GET['email'])) {

    $_SESSION['userEmailTamp'] = $_GET['email'];

    header('Location: ./change-password-controller.php');

}
else {
    header('Location: /inscription');
}