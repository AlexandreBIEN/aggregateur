<?php
require_once '../models/Interests-model.php';
$interests = new Interests();
session_start();
$_SESSION['interestsList'] = $interests->get_all_interests();

header('Location: /inscription');