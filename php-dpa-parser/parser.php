<?php

namespace DPAParser;

class Parser {
  var $index_folder, $correction_folder;

  public function __construct($options) {
    $this->index_folder      = $options['index_folder'];
    $this->correction_folder = $options['correction_folder'];
  }

  public function fixtures() {
    $fixtures = [];
    foreach (glob("{$this->index_folder}/*.xml") as $file) {
      $fixtures[] = new \DPAParser\Result\Fixture($file);
    }
    return $fixtures;
  }

  public function corrections() {
    $corrections = [];
    foreach (glob("{$this->correction_folder}/*.xml") as $file) {
      $corrections[] = new \DPAParser\Result\Correction($file);
    }
    return $corrections;
  }
}
