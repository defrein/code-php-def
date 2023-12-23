<?php 
$myObject = new stdClass();
$myObject->value = (int) '0';

if ($myObject->value) {
    echo "kena if";
} else {
    echo "kena else";
}


?>