    [?php echo $form->renderHiddenFields() ?]

    [?php if ($form->hasGlobalErrors()): ?]
      [?php echo $form->renderGlobalErrors() ?]
    [?php endif; ?]

    [?php $fieldsets = $configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit'); ?]
    [?php if (count($fieldsets) > 1): ?]
      [?php $params = array('class' => 'tab-pane'); ?]
    [?php else: ?]
      [?php $params = array(); ?]
    [?php endif; ?]
    
    [?php foreach ($fieldsets as $fieldset => $fields): ?]
      [?php $params = array_merge($params,
                                  array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 
                                  'form' => $form, 
                                  'fields' => $fields, 
                                  'fieldset' => $fieldset,
                                  'class' => 'inlineLabels')); ?]
      [?php include_partial('<?php echo $this->getModuleName() ?>/form_fieldset', 
                            $params); ?]
    [?php endforeach; ?]
