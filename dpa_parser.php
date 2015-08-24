<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'dpa_parser/parser.php';

foreach (glob('dpa_parser/result/*.php') as $file) {
  require $file;
}

foreach (glob('dpa_parser/result/media/*.php') as $file) {
  require $file;
}

foreach (glob('dpa_parser/result/content/*.php') as $file) {
  require $file;
}

foreach (glob('dpa_parser/result/content/media/*.php') as $file) {
  require $file;
}
