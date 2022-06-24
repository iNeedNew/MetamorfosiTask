<?php

namespace App\Controllers\Auth;

use App\Core;

class SignOutController
{
    public static function destroy()
    {
        session_destroy();
        Core::redirect('/');
    }
}