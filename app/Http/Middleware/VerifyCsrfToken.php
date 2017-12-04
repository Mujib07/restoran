<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    /**
    * Determine if the session and input CSRF tokens match.
    *
    * @param \illuminate\Http\Request $Request
    * @return bool
    */
    protected function tokensMatch($request){
      $token = $request->ajax() ? $request->header('X-CSRF-TOKEN') : $request->input('_token');
      return $request->session()->token() == $token;
    }
}