<?php

namespace DPAParser\Result;

class Content {
  var $node, $options;

  public static function parse($node, $options = []) {
    $name = $node->getName();
    switch(strtolower($name)) {
    case 'table': return new Content\Table($node, $options);
    case 'p': return new Content\P($node, $options);
    default: self::unknown_node_exception($node);
    }
  }

  function __construct($node, $options = []) {
    $this->node    = $node;
    $this->options = $options;
  }

  public function toHtml() {
    return $this->node->asXml();
  }

  private static function unknown_node_exception($node) {
    $name = $node->getName();
    $error = "Content: Unknown node '{$name}'!";
    $error .= "\n\r";
    $error .= $node->asXml();
    throw new \Exception($error);
  }
}
