<?php
require 'php-dpa-parser/parser.php';

$dirname = DIRNAME(__FILE__);

foreach (glob("{$dirname}/php-dpa-parser/result/*.php") as $file) {
  require $file;
}

foreach (glob("{$dirname}/php-dpa-parser/result/media/*.php") as $file) {
  require $file;
}

foreach (glob("{$dirname}/php-dpa-parser/result/content/*.php") as $file) {
  require $file;
}

foreach (glob("{$dirname}/php-dpa-parser/result/content/media/*.php") as $file) {
  require $file;
}
