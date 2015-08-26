<?php
# A little example how to go through each fixture and save each
# article into a file.
#
# It also shows how to use a walker method on each content element
# to manipulate things such as the image path.

require 'dpa_parser.php';

$index_folder      = '/tmp/dpa/dpa-SportsLine/dpa-SportsLine-index';
$correction_folder = '/tmp/dpa/dpa-SportsLine/dpa-SportsLine-correction';
$parser            = new DPAParser\Parser(
  ['index_folder' => $index_folder, 'correction_folder' => $correction_folder]
);

$fixtures    = $parser->fixtures();
$corrections = $parser->corrections();

function walker($element) {
  if (is_a($element, '\DPAParser\Result\Content\Media\Image')) {
    $element->set_base_path('/my/public/image/or/cdn/dir/');
  }
}

foreach ($fixtures as $fixture) {
  foreach ($fixture->media() as $media) {
    file_put_contents("output/{$media->id()}_{$media->version()}.html",
                      $media->to_html('walker'));
  }
}

foreach ($corrections as $correction) {
  // $correction->status()
  // $correction->id()
  // $correction->version()
}
