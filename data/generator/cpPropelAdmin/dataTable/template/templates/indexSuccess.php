[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

<div id="sf_admin_container">
  <div class="toolbar">
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', 
                            array('helper' => $helper)) ?]  
  </div>
  <h1>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h1>

  [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

  <div id="sf_admin_header">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_header', array('objects' => $objects)) ?]
  </div>

  <div id="sf_admin_content">
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
    <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', 
                                     array('action' => 'batch')) ?]" method="post">
<?php endif; ?>
    [?php include_partial('<?php echo $this->getModuleName() ?>/list', 
                          array('objects' => $objects,
                                'helper' => $helper)) ?]
    <ul class="sf_admin_actions">
      [?php include_partial('<?php echo $this->getModuleName() ?>/list_batch_actions', 
                            array('helper' => $helper)) ?]
    </ul>
<?php if ($this->configuration->getValue('list.batch_actions')): ?>
    </form>
<?php endif; ?>
  </div>

  <div id="sf_admin_footer">
    [?php include_partial('<?php echo $this->getModuleName() ?>/list_footer', 
                          array('objects' => $objects,
                                'configuration' => $configuration)) ?]
  </div>
</div>