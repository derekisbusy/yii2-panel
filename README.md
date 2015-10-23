# yii2-panel
Collapsable Bootstrap panel widget.

##Options
 - **title**    title displayed in the head section of the panel
 
 - **content**  content displayed in the body section of the panel. Only use if using widget() method.
 
 - **footer** content displayed in the footer section of the panel.
 
 - **type** style to be applied to the panel.
  * info
  * default
  * danger
  * primary
  * success
  
- **collapsable** whether the panel is collapsable.

- **collapse** whether or not the panel is collapsed.

- **widget** whether or not to include javascript. Can be used to disable javascript if using as style element only.

##Examples

###Basic Example
```php
use derekisbusy\yii2-panel\PanelWidget;
echo PanelWidget::widget([
    'collapse'=>true,
    'title'=>'My Panel',
    'content'=>'...',
    'footer'=>'footer content'
    ])
]);
```

###Style Only
If you only need to create HTML for bootstrap panel and don't need any js functionality set widget to false.
```php
use derekisbusy\yii2-panel\PanelWidget;

echo PanelWidget::begin([
    'title'=>'My Panel',
    'widget'=>false, // no js included (ie. style only)
    'footer'=>'footer content'
]);

// the body

PanelWidget::end();
```

###Example with Form Widget

```php
use derekisbusy\yii2-panel\PanelWidget;

echo PanelWidget::begin([
    'title'=>$title,
    'widget'=>false,
    'footer'=>Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])
]);

// the form

PanelWidget::end();
```





