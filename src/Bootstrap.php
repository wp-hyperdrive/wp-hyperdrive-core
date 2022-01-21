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
        foreach (apply_filters('wp_hyperdrive_services', []) as $service) {
            $instance = new $service();
            if (!$instance instanceof Registerable) {
                continue;
            }
            $instance->register();
        }
    }
}
