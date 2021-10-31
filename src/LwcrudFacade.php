<?php

namespace Sitesurfer\Lwcrud;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sitesurfer\Lwcrud\Lwcrud
 */
class LwcrudFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'lwcrud';
    }
}
