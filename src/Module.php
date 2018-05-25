<?php

namespace cinkon\kittntestpluginfoo;

class Module extends \yii\base\Module {
    public function init () {
        parent::init();

        $this->params['foo'] = 'bar';
    }
}
