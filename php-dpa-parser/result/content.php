<?php

namespace DPAParser\Result;

class Content {
  var $node;

  public static function parse($node) {
    $name = $node->getName();
    switch(strtolower($name)) {
    case 'table': return new Content\Table($node);
    case 'p': return new Content\P($node);
    case 'block': return new Content\Block($node);
    case 'media': return Content\Media::parse($node);
    default: self::unknown_node_exception($node);
    }
  }

  function __construct($node) {
    $this->node = $node;
  }

  public function to_html() {
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
