[?php


/**
 * <?php echo $this->getModuleName() ?> components.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class <?php echo $this->getGeneratedModuleName() ?>Components extends sfComponents
{
  public function executeDesignelements_list(sfWebRequest $request)
  {
    $this->elements = sfConfig::get('app_gjPositionsPlugin_design_elements', array());
  }

  public function executeDesignelements_show(sfWebRequest $request)
  {
    $designElement = new gjDesignElement();
    $designElement->name = $this->name;
    //$designElement->setObject($this->canvas);

    $this->form = new gjDesignElementPositionsForm($designElement);
    $this->form->getWidgetSchema()->setNameFormat('<?php echo $this->getSingularName(); ?>[designElements][x][%s]');
  }

  public function executeContentelements_list(sfWebRequest $request)
  {
    $models = array('Article', 'Gallery', 'Glossary');
    $this->allRecords = array();
    foreach($models as $model)
    {
      $this->allRecords[$model] = Doctrine_Core::getTable($model)->findAll();
    }
  }
}
