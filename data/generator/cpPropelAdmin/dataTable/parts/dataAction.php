  public function executeData(sfWebRequest $request) {
    $query  = trim($request->getParameter('sSearch'));
    $limit  = $request->getParameter('iDisplayLength');
    $offset = $request->getParameter('iDisplayStart');
    
    $criteria = $this->configuration->getListCriteria();
    $total_criteria = $this->configuration->getListCriteria();
    
    if ($query) {
      $searchFields = $this->configuration->getSearchFields();
      foreach ($searchFields as $i => $field) {
        if ($i == 0) {
          $c = $criteria->getNewCriterion($field, '%' . strtolower($query) . '%', Criteria::LIKE);
          $total_c = $total_criteria->getNewCriterion($field, '%' . strtolower($query) . '%', Criteria::LIKE);
        }
        $c->addOr($criteria->getNewCriterion($field, '%' . strtolower($query) . '%', Criteria::LIKE));
        $total_c->addOr($total_criteria->getNewCriterion($field, '%' . strtolower($query) . '%', Criteria::LIKE));
      }
      
      $criteria->add($c);
      $total_criteria->add($total_c);
    }
    
    $sort_columns  = $this->configuration->getSortColumn($request->getParameter('iSortCol_0'));
    $sort_direction = strtolower($request->getParameter('sSortDir_0'));
    foreach ($sort_columns as $column) {
      switch ($sort_direction) {
        case 'desc' :
          $criteria->addDescendingOrderByColumn($column);
          break;
        case 'asc' :
          $criteria->addAscendingOrderByColumn($column);
          break;
      }
    }
    
    $criteria->setLimit($limit);
    $criteria->setOffset($offset);
    $this->objects = <?php echo constant($this->getModelClass().'::PEER') ?>::doSelect($criteria);
    $this->total = <?php echo constant($this->getModelClass().'::PEER') ?>::doCount($total_criteria);
    $this->query = $query;
  }
