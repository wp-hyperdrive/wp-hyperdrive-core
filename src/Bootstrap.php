<?php

namespace Hyperdrive\Core;

use Hyperdrive\Core\Interfaces\Registerable;

defined('ABSPATH') || exit('That\'s not how the Force works!');

class Bootstrap
{
    /**
     * @param array $services
     */
    public static function load(array $services = []): void
    {
        foreach (apply_filters('wp_hyperdrive_services', $services) as $service) {
            $instance = new $service();
            if (!$instance instanceof Registerable) {
                continue;
            }
            $instance->register();
        }
    }
}
