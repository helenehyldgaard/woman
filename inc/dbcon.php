<?php
session_start();
$DB_HOST = 'helenehyldgaard.com.mysql';
$DB_USER = 'helenehyldgaard_com_woman';
$DB_PASS = 'kurt12345678910';
$DB_NAME = 'helenehyldgaard_com_woman';

$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($link->connect_error) {
    die('Connect Error ('.$link->connect_errno.') '.$link->connect-error);
}
$link->set_charset('utf8');
?>