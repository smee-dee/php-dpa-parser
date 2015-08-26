<?php

namespace DPAParser\Result;

class Base {
  var $file, $parsed_xml;

  function __construct($file) {
    $this->file = $file;
  }

  public function folder() {
    return dirname($this->file);
  }

  protected function xml() {
    if ($this->parsed_xml) return $this->parsed_xml;
    $this->parsed_xml = simplexml_load_file($this->file);
    return $this->parsed_xml;
  }
}
