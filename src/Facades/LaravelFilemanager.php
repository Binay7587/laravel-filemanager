<?php

namespace Binay\LaravelFilemanager\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelFilemanager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravelfilemanager';
    }
}
