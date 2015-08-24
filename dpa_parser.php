<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'dpa_parser/parser.php';
require 'dpa_parser/result/base.php';
require 'dpa_parser/result/fixture.php';
require 'dpa_parser/result/media.php';
require 'dpa_parser/result/media/text.php';
require 'dpa_parser/result/content.php';

foreach (glob('dpa_parser/result/content/*.php') as $file) {
  require $file;
}

foreach (glob('dpa_parser/result/content/media/*.php') as $file) {
  require $file;
}


# @TODO: Only for testing. Remove in production

$folder = '/tmp/dpa/dpa-SportsLine-index';
$parser = new DPAParser\Parser($folder);
$fixtures = $parser->fixtures();

function walker($element) {
  if (is_a($element, '\DPAParser\Result\Content\Media\Image')) {
    $element->set_base_path('/my/public/image/or/cdn/dir/');
  }
}

foreach ($fixtures as $fixture) {
  foreach ($fixture->media() as $media) {
    file_put_contents("output/{$media->id()}_{$media->version()}.html",
                      $media->to_html(null, 'walker'));
  }
}
