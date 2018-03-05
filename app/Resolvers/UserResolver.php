<?php
namespace App\Resolvers;
use Illuminate\Support\Facades\Auth;

class UserResolver implements \OwenIt\Auditing\Contracts\UserResolver
{
    /**
     * {@inheritdoc}
     */
    public static function resolve()
    {
        return Auth::check() ? Auth::id() : null;
    }
    public static function resolveId()
    {
        return Auth::check() ? Auth::id() : null;
    }
}