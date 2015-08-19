<?php

namespace DPAParser;

class Parser {
  var $index_folder;

  public function __construct($index_folder) {
    $this->index_folder = $index_folder;
  }

  public function fixtures() {
    $fixtures = [];
    foreach (glob("{$this->index_folder}/*.xml") as $file) {
      $fixtures[] = new \DPAParser\Result\Fixture($file);
      break; // @TODO: Remove before production
    }
    return $fixtures;
  }
}
