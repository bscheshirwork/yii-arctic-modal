<?php

/**
 * Wrapper for arctic modal, http://arcticlab.ru/arcticmodal
 */
class Modal extends CInputWidget
{
    /**
     * @var array
     */
    public $options = array();

    /**
     * http://www.yiiframework.com/doc/api/1.1/CClientScript#registerScriptFile-detail
     * @var integer Script position
     */
    public $scriptPosition=null;

    /**
     * @var string Html element selector
     */
    public $selector;

    public static function initClientScript($scriptPosition = null) {
        $ds = DIRECTORY_SEPARATOR;
        $bujs = Yii::app()->assetManager->publish(dirname(__FILE__)."{$ds}..{$ds}..{$ds}vjik{$ds}arctic-modal{$ds}arcticmodal");
        $bucss = Yii::app()->assetManager->publish(dirname(__FILE__)."{$ds}..{$ds}..{$ds}vjik{$ds}arctic-modal{$ds}arcticmodal");
        $cs = Yii::app()->clientScript;
        if ($scriptPosition === null)
            $scriptPosition = $cs->coreScriptPosition;
        $cs->registerScriptFile($bujs.'/jquery.arcticmodal'.'.js', $scriptPosition);
        $cs->registerCssFile($bucss.'/ jquery.arcticmodal'.'.css');

    }

    public function run() {
        if ($this->selector === null) {
            list($this->name, $this->id) = $this->resolveNameId();
            $this->selector = '#'.$this->id;
        }

        if (!isset($this->htmlOptions['value'])) {
            if ($this->hasModel()) {
                $this->value = CHtml::resolveValue($this->model, $this->attribute);
            }
        } else {
            $this->value = $this->htmlOptions['value'];
            unset($this->htmlOptions['value']);
        }

        self::initClientScript($this->scriptPosition);
        $options = $this->options !== null ? CJavaScript::encode($this->options) : '';
        Yii::app()->clientScript->registerScript(__CLASS__.'#'.$this->id, "jQuery('{$this->selector}').arcticmodal({$options})");

        echo '<div class="modal">'.
            CHtml::textField($this->name, $this->value, $this->htmlOptions);
    }
}
