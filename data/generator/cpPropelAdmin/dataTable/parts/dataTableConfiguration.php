 public function getDataTableparams() {
   return <?php echo $this->asPhp(isset($this->config['dataTable']) ? $this->config['dataTable'] : array()) ?>;
<?php unset($this->config['dataTable']) ?>
 }