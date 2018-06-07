  public function executeEdit(sfWebRequest $request)
  {
    $this-><?php echo $this->getSingularName() ?> = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this-><?php echo $this->getSingularName() ?>);
    $this->tab = $request->getParameter('tab', $this->getUser()->getAttribute('admin_' . $this->getModuleName() . '_tab'));
    $this->getUser()->setAttribute('admin_' . $this->getModuleName() . '_tab', $this->tab);
  }
