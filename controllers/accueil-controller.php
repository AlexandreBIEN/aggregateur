<?php
require_once __DIR__ . '/../models/user-model.php';
require_once __DIR__ . '/../models/xml-model.php';

$xmlModel = new Xml();

$xml = $xmlModel->get_data_from_xml("A la une");