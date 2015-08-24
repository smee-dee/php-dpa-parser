<?php

namespace DPAParser\Result;

class Media extends Base {
  public static function create_for($type, $file) {
    switch ($type) {
    case 'text': return new \DPAParser\Result\Media\Text($file);
    default:     throw new Exception("Media: Unkown type '{$type}'!");
    }
  }

  public function toHtml($options = []) {
    $html = '';
    foreach ($this->content($options) as $element) {
      $html .= $element->toHtml();
    }
    return $html;
  }
}
