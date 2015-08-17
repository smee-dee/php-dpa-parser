<?php

namespace DPAParser\Result;

class Fixture extends Base {
  public function id() {
    return $this->xml()->head->docdata->fixture['fix-id'];
  }

  public function media() {
    $result = [];
    foreach ($this->xml()->body->{'body.content'}->children() as $node) {
      $result[] = $this->create_media_for($node);
    }

    return $result;
  }

  private function create_media_for($node) {
    $type = $node['media-type'];
    $file = "{$this->folder()}/{$node->{'media-reference'}['source']}";
    return \DPAParser\Result\Media::create_for($type, $file);
  }
}
