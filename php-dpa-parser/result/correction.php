<?php

namespace DPAParser\Result;

class Correction extends Base {
  public function status() {
    return $this->docdata_attribute('management-idref-status');
  }

  public function id() {
    return $this->id_string_part(0);
  }

  public function version() {
    return $this->id_string_part(1);
  }

  public function docdata_attribute($attribute) {
    return (string)$this->xml()->head->docdata[$attribute];
  }

  private function id_string_part($index) {
    $id_string = $this->docdata_attribute('management-doc-idref');
    return explode(':', $id_string)[$index];
  }
}
