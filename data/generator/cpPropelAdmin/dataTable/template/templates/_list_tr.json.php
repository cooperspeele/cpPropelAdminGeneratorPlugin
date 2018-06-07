[?php $data = array(); ?]
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
  [?php $data[] = get_partial('<?php echo $this->getModuleName() ?>/list_td_batch_actions', 
                              array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 
                                    'helper' => $helper)); ?]
<?php endif; ?>
<?php foreach ($this->configuration->getValue('list.display') as $name => $field): ?>
  [?php $value = <?php echo $this->addCredentialCondition($this->renderField($field), $field->getConfig()); ?>;
        $data[] = is_object($value) ? $value->__toString() : $value; ?]
<?php endforeach; ?>
<?php if ($this->configuration->getValue('list.object_actions')): ?>
  [?php $data[] = get_partial('<?php echo $this->getModuleName() ?>/list_td_actions', 
                            array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 
                            'helper' => $helper)); ?]
<?php endif; ?>
[?php echo json_encode($data); ?]