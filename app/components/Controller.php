<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
  protected $_assetsUrl;

  /**
   * @var string the default layout for the controller view. Defaults to '//layouts/column1',
   * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
   */
  public $layout='//layouts/column1';
  /**
   * @var array context menu items. This property will be assigned to {@link CMenu::items}.
   */
  public $menu=array();
  /**
   * @var array the breadcrumbs of the current page. The value of this property will
   * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
   * for more details on how to specify this property.
   */
  public $breadcrumbs=array();

  public function stylesheetLinkTag($filename, $media = '')
  {
    Yii::app()->clientScript->registerCssFile($this->getAssetsUrl() . '/css/' . $filename, $media);
  }


  public function javascriptLinkTag($filename, $position=CClientScript::POS_HEAD)
  {
    Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl().'/js/'.$filename, $position);
  }

  public function imageTag($filename, $alt = '', $options = [])
  {
    return CHtml::image($this->assetsUrl.'/img/'.$filename, $alt, $options);
  }

  public function imagePath($filename)
  {
    return $this->assetsUrl . '/img/' . $filename;
  }

  public function getAssetsUrl()
  {
    if ($this->_assetsUrl === null)
    {
      $assetsPath = Yii::getPathOfAlias('application.assets');
      $assetsUrl = Yii::app()->assetManager->publish($assetsPath);
      $this->_assetsUrl = $assetsUrl;
    }
    return $this->_assetsUrl;
  }

}