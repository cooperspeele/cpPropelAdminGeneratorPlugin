{ "sEcho": [?php echo intval($sf_request->getParameter('sEcho')); ?],
  "iTotalRecords": [?php echo $total; ?],
  "iTotalDisplayRecords": [?php echo $total; ?],
  "aaData": [
    [?php $n = count($objects); 
      for ($i = 0; $i < $n; $i++) {
        if ($i > 0) { echo ','; }
        $object = $objects[$i]; 
        include_partial('<?php echo $this->getModuleName() ?>/list_tr', 
                        array('<?php echo $this->getSingularName(); ?>' => $object,
                              'helper' => $helper)); 
    } ?]
  ]
}