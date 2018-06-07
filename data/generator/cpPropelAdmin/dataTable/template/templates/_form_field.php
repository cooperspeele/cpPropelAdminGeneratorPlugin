[?php if ($field->isPartial()): ?]
  [?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, 
                        array('form' => $form, 
                              'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php elseif ($field->isComponent()): ?]
  [?php include_component('<?php echo $this->getModuleName() ?>', 
                          $name, 
                          array('form' => $form, 
                                'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php else: ?]
  [?php if ($form[$name] instanceof sfFormFieldSchema): ?]
    [?php echo $form[$name]->render(); ?]
  [?php else: ?]
    [?php echo $form[$name]->renderRow(); ?]
  [?php endif; ?]
[?php endif; ?]
