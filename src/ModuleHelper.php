<?php

namespace cinkon\kittntestpluginfoo;

use Craft;

abstract class ModuleHelper {
    public static function registerKittnTestPluginFoo () {
        if (!Craft::$app->hasModule('kittn-test-plugin-foo')) {
            Craft::$app->setModule('kittn-test-plugin-foo', Module::class);

            Craft::$app->getModule('kittn-test-plugin-foo');
        }
    }
}
