yii-bootstrap-timepicker
========================

Yii wrapper for vjik/arctic-modal

usage:

First, import the widget class file / Импортируем виджет:

```php
Yii::import('application.vendor.bscheshir.yii-arctic-modal.Modal', true);
```

Next, call the widget / Вызываем виджет:

```php
$this->widget('Modal', [
    'model' => $model,
    'attribute' => 'TimeActual',
    // some options, see more at / Немного опций, см. http://arcticlab.ru/arcticmodal/#docs
    'options' => [
        'disableFocus'=>true,
        'overlay'=>[
                'css': [
                    'backgroundColor' => '#fff',
                    'backgroundImage' => 'url(images/overlay.png)',
                    'backgroundRepeat' => 'repeat',
                    'backgroundPosition' => '50% 0',
                    'opacity' => 0.75
                ]
            ]
    ],
]);
```

