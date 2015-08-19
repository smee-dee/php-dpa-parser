<?php

namespace DPAParser\Result\Media;

class Text extends \DPAParser\Result\Media {
  public function id() {
    return $this->id_string_part(0);
  }

  public function version() {
    return $this->id_string_part(1);
  }

  private function id_string_part($index) {
    $id_string = $this->xml()->head->docdata->{'doc-id'}['id-string'];
    return explode(':', $id_string)[$index];
  }
}
