<?php

namespace DPAParser\Result;

class Media extends Base {
  public static function create_for($type, $file) {
    switch ($type) {
    case 'text': return new \DPAParser\Result\Media\Text($file);
    default:     throw new Exception("Media: Unkown type '{$type}'!");
    }
  }

  public function to_html($options = [], $walker = null) {
    $html = '';
    foreach ($this->content($options) as $element) {
      if (isset($walker)) {
        $result = $walker($element);
        if (is_string($result)) {
          $html .= $result;
          continue;
        }
      }
      $html .= $element->to_html();
    }
    return $html;
  }
}
