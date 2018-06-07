  public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
  
    $this->sort = $this->getSort();
    $this->objects = call_user_func(array("<?php echo constant($this->getModelClass().'::PEER') ?>",
                                          $this->configuration->getPeerMethod()))->getDescendants();

    
  }
