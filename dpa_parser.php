<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'dpa_parser/parser.php';
require 'dpa_parser/result/base.php';
require 'dpa_parser/result/fixture.php';
require 'dpa_parser/result/media.php';
require 'dpa_parser/result/media/text.php';


$folder = '/tmp/dpa/dpa-sportsline/dpa-SportsLine-index';
$parser = new DPAParser\Parser($folder);
$results = $parser->fixtures();

foreach ($results as $result) {
  $media = $result->media()[0];
  echo $media->regsrc();
}
