<?php
abstract class cpPropelAdminModelGeneratorConfiguration extends sfModelGeneratorConfiguration {
  
  protected function getConfig() {
    return array(
      'default' => $this->getFieldsDefault(),
      'list'    => $this->getFieldsList(),
      'filter'  => $this->getFieldsFilter(),
      'form'    => $this->getFieldsForm(),
      'new'     => $this->getFieldsNew(),
      'edit'    => $this->getFieldsEdit(),
      'dataTable' => $this->getDataTableParams()
    );
  }  
  
}