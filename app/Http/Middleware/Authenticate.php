<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Auth\AuthenticationException;

/**
 * Class Authenticate
 * 
 * Middleware untuk menangani autentikasi pengguna dalam aplikasi.
 * Mendukung multiple guards termasuk admin-web dan default guard.
 * 
 * @package App\Http\Middleware
 */
class Authenticate extends Middleware
{
    /**
     * Mendapatkan path redirect untuk pengguna yang belum terautentikasi.
     * 
     * Method ini akan menentukan kemana pengguna harus diarahkan ketika
     * mereka mencoba mengakses route yang membutuhkan autentikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (in_array('admin-web', config('auth.guards'))) {
                    return route('admin.login');
            }

            return route('login');
        }

        return null;
    }

    /**
     * Menangani pengguna yang tidak terautentikasi.
     * 
     * Method ini akan dijalankan ketika pengguna mencoba mengakses
     * route terproteksi tanpa autentikasi yang valid.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function unauthenticated($request, array $guards)
    {
        throw new AuthenticationException(
            'Unauthenticated.',
            $guards,
            $this->redirectTo($request)
        );
    }
}
