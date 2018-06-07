<?php if (isset($this->params['css'])): ?>
  [?php use_stylesheet('<?php echo $this->params['css'] ?>') ?]
<?php else: ?>
  [?php use_stylesheet(sfConfig::get('app_cp_admin_datatables_dir', '/cpPropelAdminGeneratorPlugin/dataTable') . '/extras/TableTools/css/TableTools.css'); ?]
  [?php use_stylesheet(sfConfig::get('app_cp_admin_datatables_dir', '/cpPropelAdminGeneratorPlugin/dataTable') . '/css/dataTables.css'); ?]
  [?php use_stylesheet('/cpPropelAdminGeneratorPlugin/dataTable/css/admin.css'); ?]
  [?php use_stylesheet('/cpPropelAdminGeneratorPlugin/dataTable/css/tabs.css'); ?]
  [?php use_stylesheet(sfConfig::get('app_cp_admin_autotabs_dir', '/cpPropelAdminGeneratorPlugin/dataTable/css') . '/jquery.autotabs.css'); ?]
<?php endif; ?>
[?php use_javascript(sfConfig::get('app_cp_admin_datatables_dir', '/cpPropelAdminGeneratorPlugin/dataTable') . '/js/jquery.dataTables.min.js'); ?]
[?php use_javascript(sfConfig::get('app_cp_admin_datatables_dir', '/cpPropelAdminGeneratorPlugin/dataTable') . '/extras/TableTools/js/ZeroClipboard.js'); ?]
[?php use_javascript(sfConfig::get('app_cp_admin_datatables_dir', '/cpPropelAdminGeneratorPlugin/dataTable') . '/extras/TableTools/js/TableTools.min.js'); ?]
[?php use_javascript(sfConfig::get('app_cp_admin_datatables_dir', '/cpPropelAdminGeneratorPlugin/dataTable') . '/js/jquery.dataTables.ext.js'); ?]
[?php use_javascript(sfConfig::get('app_cp_admin_cookie_dir', '/cpPropelAdminGeneratorPlugin/dataTable') . '/jquery.cookie.js'); ?]
[?php use_javascript(sfConfig::get('app_cp_admin_autotabs_dir', '/cpPropelAdminGeneratorPlugin/dataTable/js') . '/jquery.autotabs.js'); ?]

