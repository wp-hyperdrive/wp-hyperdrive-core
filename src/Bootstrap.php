<?php

namespace Hyperdrive\Core;

use Hyperdrive\Core\Interfaces\Registerable;

defined('ABSPATH') or die('That\'s not how the Force works!');

class Bootstrap
{
    /**
     * @return void
     */
    public static function load(): void
    {
        foreach (self::getServices() as $service) {
            $instance = new $service();
            if (!$instance instanceof Registerable) {
                continue;
            }
            $instance->register();
        }
    }

    /**
     * @return Registerable[]
     */
    private static function getServices(): array
    {
        $services = [];

        if (class_exists(\Hyperdrive\AdminPages\Bootstrap::class)) {
            $services[] = \Hyperdrive\AdminPages\Bootstrap::class;
        }

        return apply_filters('wp_hyperdrive_services', $services);
    }
}
