  public function executeUpdate(sfWebRequest $request)
  {
    $this-><?php echo $this->getSingularName() ?> = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this-><?php echo $this->getSingularName() ?>);
    $this->tab = $request->getParameter('tab', $this->getUser()->getAttribute('admin_' . $this->getModuleName() . '_tab'));
    $this->getUser()->setAttribute('admin_' . $this->getModuleName() . '_tab', $this->tab);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
