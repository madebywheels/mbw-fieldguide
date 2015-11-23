<?php

namespace Craft;

/**
 * MBW Fieldguide Plugin
 *
 * @author      Made by Wheels
 * @link        http://madebywheels.com
 */
class MbwFieldguidePlugin extends BasePlugin
{
    /**
     * Get plugin name
     *
     * @return null|string
     */
    public function getName()
    {
        return Craft::t('Fieldguide');
    }

    /**
     * Get version number
     *
     * @return string
     */
    public function getVersion()
    {
        return '0.1';
    }

    /**
     * Get plugin developer
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Made by Wheels';
    }

    /**
     * Get plugin developer's url
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://madebywheels.com';
    }

    /**
     * Plugin has cp section
     *
     * @return bool
     */
    public function hasCpSection()
    {
        return true;
    }

    /**
     *
     */
    public function registerCpRoutes()
    {
        return array(
            'mbwfieldguide/(?P<groupHandle>(section|globals))/(?P<groupId>\d+)' => 'mbwfieldguide/index'
        );
    }

}