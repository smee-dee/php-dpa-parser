<?php

namespace DPAParser;

class Parser {
  var $indexFolder;

  public function __construct($indexFolder) {
    $this->indexFolder = $indexFolder;
  }

  public function fixtures() {
    $fixtures = [];
    foreach (glob("{$this->indexFolder}/*.xml") as $file) {
      $fixtures[] = new \DPAParser\Result\Fixture($file);
      break; // @TODO: Remove before production
    }
    return $fixtures;
  }
}
