<?php

include "XmlDzogchen.php";

$input = array('id'=>55, 'value'=> 'xxxtext');
$n = new XmlDzogchen('data.xml.php');
$n->addNewValue($input['id'], $input['value']);
//$n->updateValue($input['id'], 'zmena');