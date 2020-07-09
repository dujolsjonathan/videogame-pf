<?php

namespace App\Http\Controllers;

use App\Utils\UserSession;
use Illuminate\Support\Facades\View;
use Laravel\Lumen\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    public function __construct()
    {
        View::share('connectedUser', UserSession::getUser());
    }
}
