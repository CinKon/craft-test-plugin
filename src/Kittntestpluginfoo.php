<?php
/**
 * Kittntestpluginfoo
 *
 * @author     Michael Rog <michael@michaelrog.com>, Tom Davies <tom@madebykind.com>
 * @link       https://topshelfcraft.com
 * @copyright  Copyright 2017, Top Shelf Craft (Michael Rog)
 * @see        https://github.com/topshelfcraft/Environment-Label
 */

namespace cinkon\kittntestpluginfoo;

use Craft;
use craft\base\Plugin;
use craft\web\View;
use cinkon\kittntestpluginfoo\models\Settings;
use cinkon\kittntestpluginfoo\services\Label;
use yii\base\Event;

/**
 * @author   Michael Rog <michael@michaelrog.com>
 * @package  Kittntestpluginfoo
 * @since    3.0.0
 *
 * @property  Label $label
 * @property  Settings $settings
 *
 * @method    Settings getSettings()
 */
class Kittntestpluginfoo extends Plugin
{


    /*
     * Static properties
     */


    /**
     * @var Kittntestpluginfoo $plugin
     */
    public static $plugin;


    /*
     * Public methods
     */


    /**
     * Initializes the plugin, sets its static self-reference, registers the Twig extension,
     * and adds the Kittntestpluginfoo as appropriate.
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->getView()->getTwig()->addGlobal('kittntestpluginfoo', Kittntestpluginfoo::$plugin->label);

        Event::on(
            View::class,
            View::EVENT_BEFORE_RENDER_PAGE_TEMPLATE,
            function (Event $event) {
                Kittntestpluginfoo::$plugin->label->doItBaby();
            }
        );
    }


    /*
     * Protected methods
     */


    /**
     * Creates and returns the model used to store the plugin’s settings.
     *
     * @return \cinkon\kittntestpluginfoo\models\Settings|null
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }


    /**
     * Returns the rendered settings HTML, which will be inserted into the content
     * block on the settings page.
     *
     * @return string The rendered settings HTML
     *
     * @throws \Twig_Error_Loader
     * @throws \yii\base\Exception
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'kittn-test-plugin-foo/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
