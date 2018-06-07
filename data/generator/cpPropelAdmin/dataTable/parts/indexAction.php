  public function executeIndex(sfWebRequest $request) {
    $this->objects = $this->getRoute()->getObjects();
  }
