[?php foreach ($objects as $i => $<?php echo $this->getSingularName() ?>): ?]
  <tr class="sf_admin_row">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_tr', 
                          array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 
                                'helper' => $helper)) ?]
  </tr>
[?php endforeach; ?]
