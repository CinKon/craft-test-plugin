<?php

namespace cinkon\kittntestpluginfoo\services;

use craft\web\View;
use craft\events\RegisterTemplateRootsEvent;

use yii\base\Component;
use yii\base\Event;

class Base extends Component
{
    public function init()
    {
        // Route template requests for frontend Blockonomicon resoruces.
        Event::on(
            View::class,
            View::EVENT_REGISTER_CP_TEMPLATE_ROOTS,
            function (RegisterTemplateRootsEvent $event) {
                $event->roots['kittntestpluginfoo'] = $this->getBasePath().DIRECTORY_SEPARATOR.'templates';
            }
        );

        parent::init();
    }
}
