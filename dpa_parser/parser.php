<?php

namespace DPAParser;

class Parser {
  var $file = null;

  public static function parse_index_folder($folder) {
    $fixtures = [];
    foreach (glob("{$folder}/*.xml") as $file) {
      $fixtures[] = (new Parser($file))->parse();
      break; // @TODO: Remove before production
    }
    return $fixtures;
  }

  function __construct($file) {
    $this->file = $file;
  }

  function parse() {
    return new \DPAParser\Result\Fixture($this->file);
  }
}
