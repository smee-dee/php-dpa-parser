<?php

namespace DPAParser\Result\Content;

class Block extends \DPAParser\Result\Content {
  public function to_html() {
    $html = parent::to_html();
    $html = str_replace('<block', '<div', $html);
    $html = str_replace('</block', '</div', $html);
    $html = str_replace('style=', 'class=', $html);
    return $html;
  }
}
