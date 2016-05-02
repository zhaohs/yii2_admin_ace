<?php
namespace app\libs\widgets;

use Yii;
use app\libs\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\InvalidCallException;
use yii\base\Widget;
use yii\base\Model;
use yii\widgets\ActiveFormAsset;

class ActiveForm extends \yii\widgets\ActiveForm
{

    public $options = [
        'class' => 'form-horizontal',
        'role' => 'form'
    ];

    public $fieldClass = 'app\libs\widgets\ActiveField';

    public function defaultButtons($model = null)
    {
        $html = '';
        $html .= '<div class="clearfix form-actions">';
        $html .= '<div class="col-md-offset-3 col-md-9">';
        if ($model) {
            $html .= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => 'btn btn-info']);
        } else {
            $html .= Html::submitButton('创建', ['class' => 'btn btn-info']);
        }

        $html .= '</div></div>';
        return $html;
    }

    public static function beginForm($action = '', $method = 'post', $options = [])
    {
        $action = Url::to($action);

        $hiddenInputs = [];

        $request = Yii::$app->getRequest();
        if ($request instanceof Request) {
            if (strcasecmp($method, 'get') && strcasecmp($method, 'post')) {
                // simulate PUT, DELETE, etc. via POST
                $hiddenInputs[] = static::hiddenInput($request->methodParam, $method);
                $method = 'post';
            }
            $csrf = ArrayHelper::remove($options, 'csrf', true);

            if ($csrf && $request->enableCsrfValidation && strcasecmp($method, 'post') === 0) {
                $hiddenInputs[] = static::hiddenInput($request->csrfParam, $request->getCsrfToken());
            }
        }

        if (!strcasecmp($method, 'get') && ($pos = strpos($action, '?')) !== false) {
            // query parameters in the action are ignored for GET method
            // we use hidden fields to add them back
            foreach (explode('&', substr($action, $pos + 1)) as $pair) {
                if (($pos1 = strpos($pair, '=')) !== false) {
                    $hiddenInputs[] = static::hiddenInput(
                        urldecode(substr($pair, 0, $pos1)),
                        urldecode(substr($pair, $pos1 + 1))
                    );
                } else {
                    $hiddenInputs[] = static::hiddenInput(urldecode($pair), '');
                }
            }
            $action = substr($action, 0, $pos);
        }

        $options['action'] = $action;
        $options['method'] = $method;
        $form = '<div class="row"><div class="col-xs-12">';
        $form .= static::beginTag('form', $options);
        if (!empty($hiddenInputs)) {
            $form .= "\n" . implode("\n", $hiddenInputs);
        }

        return $form;
    }

    public function run()
    {
        if (!empty($this->_fields)) {
            throw new InvalidCallException('Each beginField() should have a matching endField() call.');
        }

        if ($this->enableClientScript) {
            $id = $this->options['id'];
            $options = Json::htmlEncode($this->getClientOptions());
            $attributes = Json::htmlEncode($this->attributes);
            $view = $this->getView();
            ActiveFormAsset::register($view);
            $view->registerJs("jQuery('#$id').yiiActiveForm($attributes, $options);");
        }

        echo Html::endForm();
        echo "</div></div>";
    }
}
