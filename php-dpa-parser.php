<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'php-dpa-parser/parser.php';

foreach (glob('php-dpa-parser/result/*.php') as $file) {
  require $file;
}

foreach (glob('php-dpa-parser/result/media/*.php') as $file) {
  require $file;
}

foreach (glob('php-dpa-parser/result/content/*.php') as $file) {
  require $file;
}

foreach (glob('php-dpa-parser/result/content/media/*.php') as $file) {
  require $file;
}
