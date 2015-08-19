<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'dpa_parser/parser.php';
require 'dpa_parser/result/base.php';
require 'dpa_parser/result/fixture.php';
require 'dpa_parser/result/media.php';
require 'dpa_parser/result/media/text.php';


$folder = '/tmp/dpa/dpa-sportsline/dpa-SportsLine-index';
$results = DPAParser\Parser::parse_index_folder($folder);

foreach ($results as $result) {
  $media = $result->media()[0];
  echo $media->regsrc();
}
