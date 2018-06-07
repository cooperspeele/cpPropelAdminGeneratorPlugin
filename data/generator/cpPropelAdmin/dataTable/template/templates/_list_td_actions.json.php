<ul class="sf_admin_td_actions">
<?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): ?>
  <li class="sf_admin_action_<?php echo $params['class_suffix'] ?>">
    <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params) ?>
  </li>
<?php endforeach; ?>
</ul>
