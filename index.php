<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

const ROOT_DIR = __DIR__;
const ENV = 'Cms';
const DS = DIRECTORY_SEPARATOR;

require_once 'Engine/boostrap.php';
error_reporting (E_ALL ^ E_NOTICE);