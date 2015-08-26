<?php

namespace DPAParser\Result\Media;

class Text extends \DPAParser\Result\Media {
  public function id() {
    return $this->id_string_part(0);
  }

  public function version() {
    return $this->id_string_part(1);
  }

  public function regsrc() {
    return (string)$this->xml()->head->docdata->{'doc-id'}['regsrc'];
  }

  public function timestamp() {
    return (string)$this->xml()->head->docdata->{'date.issue'}['norm'];
  }

  public function title() {
    return (string)$this->xml()->head->title;
  }

  public function headline() {
    return (string)$this->body()->{'body.head'}->hedline->hl1;
  }

  public function content() {
    $result = [];
    foreach ($this->body()->{'body.content'}->children() as $child) {
      $result[] = \DPAParser\Result\Content::parse($child);
    }
    return $result;
  }

  private function body() {
    return $this->xml()->body;
  }

  private function id_string_part($index) {
    $id_string = $this->xml()->head->docdata->{'doc-id'}['id-string'];
    return explode(':', $id_string)[$index];
  }
}
