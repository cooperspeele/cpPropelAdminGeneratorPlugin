<div class="sf_admin_list">
  <table cellspacing="0" id="<?php echo $this->getPluralName(); ?>" class="list">
    <thead>
      <tr>
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
        <th id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
<?php endif; ?>
          [?php include_partial('<?php echo $this->getModuleName() ?>/list_th_<?php echo $this->configuration->getValue('list.layout') ?>') ?]
<?php if ($this->configuration->getValue('list.object_actions')): ?>
        <th id="sf_admin_list_th_actions">[?php echo __('Actions', array(), 'sf_admin') ?]</th>
<?php endif; ?>
      </tr>
    </thead>
    <tbody>
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_body', 
                            array('objects' => $objects,
                                  'helper' => $helper)) ?]
    </tbody>
  </table>
</div>