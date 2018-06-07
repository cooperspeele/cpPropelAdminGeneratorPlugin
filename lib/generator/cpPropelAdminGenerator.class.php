<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Propel generator.
 *
 * @package    symfony
 * @subpackage propel
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfPropelGenerator.class.php 16976 2009-04-04 12:47:44Z fabien $
 */
class cpPropelAdminGenerator extends sfPropelGenerator {

  /**
   * Initializes the current sfGenerator instance.
   *
   * @param sfGeneratorManager $generatorManager A sfGeneratorManager instance
   */
  public function initialize(sfGeneratorManager $generatorManager) {
    parent::initialize($generatorManager);
    $this->setGeneratorClass('cpPropelAdmin');
  }

  /**
   * Gets the i18n catalogue to use for user strings.
   *
   * @return string The i18n catalogue
   */
  public function getI18nCatalogue() {
    if (isset($this->params['i18n_catalogue'])) {
      return $this->params['i18n_catalogue'];
    }
    return $this->getFormObject() ?
             $this->getFormObject()->getWidgetSchema()->getFormFormatter()->getTranslationCatalogue() :
             'messages';
  }

  /**
   * Returns HTML code for an action link.
   *
   * @param string  $actionName The action name
   * @param array   $params     The parameters
   * @param boolean $pk_link    Whether to add a primary key link or not
   *
   * @return string HTML code
   */
  public function getLinkToAction($actionName, $params, $pk_link = false) {
    $options = isset($params['params']) ? $params['params'] : array();

    // default values
    if ($actionName[0] == '_') {
      $actionName = substr($actionName, 1);
      $name       = $actionName;
      $icon       = isset($params['icon']) ? $params['icon'] : sfConfig::get('sf_admin_web_dir').'/images/'.$actionName.'.png';
      $action     = $actionName;

      if ($actionName == 'delete') {
        $options['method'] = 'delete';
        if (!isset($options['confirm'])) {
          $options['confirm'] = 'Are you sure?';
        }
      }
    }
    else {
      $name  = isset($params['label']) ? 
                  $params['label'] :
                  (isset($params['name']) ? $params['name'] : $actionName);
      $icon   = isset($params['icon']) ? sfToolkit::replaceConstants($params['icon']) : null; //sfConfig::get('sf_admin_web_dir').'/images/default_icon.png';
      $action = isset($params['action']) ? $params['action'] : 'List'.sfInflector::camelize($actionName);
    }

    $url_params = $pk_link ? '?'.$this->getPrimaryKeyUrlParams() : '\'';

    $phpOptions = var_export($options, true);

    // little hack
    $phpOptions = preg_replace("/'confirm' => '(.+?)(?<!\\\)'/", '\'confirm\' => __(\'$1\')', $phpOptions);

    $link = $icon ? 
              'image_tag(\''.$icon.'\', array(\'alt\' => __(\''.$name.'\', null, \''.$this->getI18nCatalogue().'\')))' :
              '__(\''.$name.'\', null, \''.$this->getI18nCatalogue().'\')';
    return '[?php echo link_to('.$link.', \''.$this->getModuleName().'/'.$action.$url_params.($options ? ', '.$phpOptions : '').') ?]'."\n";
  }

  public function renderField($field) {
    $html = parent::renderField($field);
    switch (strtolower($field->getType())) {
      case 'culture' :
      case 'language' :
        $html = sprintf("get_partial('%s/list_field_culture', array('value' => %s))",
                        $this->getModuleName(),
                        $html);
        break;

      case 'country' :
        $html = sprintf("get_partial('%s/list_field_country', array('value' => %s))",
                        $this->getModuleName(),
                        $html);
        break;

      case 'url' :
        $html = sprintf("get_partial('%s/list_field_url', array('value' => %s, 'target' => '%s'))",
                        $this->getModuleName(),
                        $html,
                        $field->getConfig('target', '_self'));
        break;
    }

    return $html;
  }
}
