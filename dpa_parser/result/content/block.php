<?php

namespace DPAParser\Result\Content;

class Block extends \DPAParser\Result\Content {
  public function toHtml() {
    $html = parent::toHtml();
    $html = str_replace('<block', '<div', $html);
    $html = str_replace('</block', '</div', $html);
    $html = str_replace('style=', 'class=', $html);
    return $html;
  }
}
