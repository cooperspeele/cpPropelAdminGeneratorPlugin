<?php if ($this->configuration->getValue('list.batch_actions')): ?>
  [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_batch_actions', 
                        array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 
                              'helper' => $helper)) ?]
<?php endif; ?>
  [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_<?php echo $this->configuration->getValue('list.layout') ?>', 
                        array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
<?php if ($this->configuration->getValue('list.object_actions')): ?>
  [?php include_partial('<?php echo $this->getModuleName() ?>/list_td_actions', 
                        array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 
                        'helper' => $helper)) ?]
<?php endif; ?>
