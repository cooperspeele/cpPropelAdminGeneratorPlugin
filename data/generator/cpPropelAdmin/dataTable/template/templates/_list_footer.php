<script type="text/javascript">
/* <![CDATA[ */
function checkAll() {
  var boxes = document.getElementsByTagName('input');
  for (var index = 0; index < boxes.length; index++) {
    box = boxes[index];
    if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') {
      box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked;
    }
  }
  return true;
};

var params = [?php echo json_encode($configuration->getDataTableParams()); ?];
params.fnInitComplete = function() {
  jQuery('div.batch_actions').append(jQuery('ul.sf_admin_actions'));
};

params.fnServerData = function(sSource, aoData, fnCallback) {
  aoData.push({ name: "sf_format", value: "json" });
  jQuery.ajax({ dataType: "json", type: "POST", url: sSource, data: aoData, success: fnCallback });
};

params.oTableTools = { 
  sSwfPath: "<?php echo sfConfig::get('app_cp_admin_datatables_dir', 'cpPropelAdminGeneratorPlugin') . '/extras/TableTools/swf/copy_cvs_xls_pdf.swf'; ?>" 
};

jQuery('#<?php echo $this->getPluralName(); ?>').dataTable(params);

/* ]]> */
</script>