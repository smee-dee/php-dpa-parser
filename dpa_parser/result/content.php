<?php

namespace DPAParser\Result;

class Content {
  var $node, $options;

  public static function parse($node, $options = []) {
    $name = $node->getName();
    switch(strtolower($name)) {
    default: return new \DPAParser\Result\Content\Common($node, $options);
    }
  }

  function __construct($node, $options = []) {
    $this->node    = $node;
    $this->options = $options;
  }

  public function toHtml() {
    return $this->node->asXml();
  }
}
