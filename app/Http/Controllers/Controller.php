<?php

namespace App\Http\Controllers;

use Heritage\Foundation\Bus\DispatchesJobs;
use Heritage\Routing\Controller as BaseController;
use Heritage\Foundation\Validation\ValidatesRequests;
use Heritage\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
