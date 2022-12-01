<?php
require_once __DIR__ . '/../models/User-model.php';
require_once __DIR__ . '/../models/xml-model.php';

$xmlModel = new Xml();
$userModel = new UserModel();

session_start();

// $xmlObject = $xmlModel->get_data_from_xml($userModel->get_user_info($_SESSION['login'])[0]['interests']);
$xmlo = $xmlModel->get_rss_info($userModel->get_user_info($_SESSION['login'])[0]['interests']);
// $_SESSION['xmlo'] = $xmlModel->get_data_from_xml($userModel->get_user_info($_SESSION['login'])[0]['interests']);
echo $xmlo[0]['link'];

$_SESSION['xmlo'] = $xmlo[0]['link'];   
header('Location: /accueil');