<?php

namespace DPAParser\Result\Content;

abstract class Media extends \DPAParser\Result\Content {
  protected $size = 'thumbnail', $base_path = '../';

  abstract public function media_tag();

  public function to_html() {
    $result = '';
    $result .= '<figure>';
    $result .= $this->media_tag();
    $result .= $this->figcaption_tag();
    $result .= '</figure>';
    return $result;
  }

  public function set_size($size) {
    $this->size = $size;
  }

  public static function parse($node) {
    $type = $node['media-type'];
    switch(strtolower($type)) {
    case 'image': return new Media\Image($node);
    default: throw new \Exception("Unkown Content Media: {$type}");
    }
  }

  public function set_base_path($base_path) {
    $this->base_path = rtrim($base_path, '/') . '/';
  }

  public function figcaption_tag() {
    return '<figcaption>' . $this->figcaption() . '</figcaption>';
  }

  public function figcaption() {
    $caption = '';
    foreach ($this->node->{'media-caption'}->children() as $child) {
      $caption .= $child->asXml();
    }
    return $caption;
  }

  public function producer_tag() {
    return '<span class="producer">' . $this->producer() . '</span>';
  }

  public function producer() {
    return $this->node->{'media-producer'}->person;
  }

  public function source() {
    return str_replace(
      '../', $this->base_path, $this->reference_attribute('source')
    );
  }

  public function alt() {
    return $this->reference_attribute('alternate-text');
  }

  public function width() {
    return $this->reference_attribute('width');
  }

  public function height() {
    return $this->reference_attribute('height');
  }

  private function reference_attribute($attribute) {
    return $this->current_reference()[$attribute];
  }

  protected function current_reference($size = null) {
    if (!isset($size)) $size = $this->size;
    foreach ($this->node->xpath('media-reference') as $image) {
      if (strpos($image['name'], $size) !== false) return $image;
    }
    if ($size == 'large') return $this->current_reference('medium');
    if ($size == 'medium') return $this->current_reference('thumbnail');
  }
}
