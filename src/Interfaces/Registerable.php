<?php

namespace Hyperdrive\Core\Interfaces;

defined('ABSPATH') || exit('That\'s not how the Force works!');

interface Registerable
{
    /**
     * WordPress actions and filters should be added in this method
     *
     * @return void
     */
    public function register();
}
