<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '*/action*',
        '*/get*',
        
        '*/datatables*',
        '*/ajax*',

        '/invoice/noAdmin',
        '/invoice/checkFinance',
        '/invoice/noteInvoice',
        '/invoice/checkMaster',

        '/pr/changePurchasing',
        '/pr/checkAudit',
        '/pr/checkFinance',
        '/pr/noteAudit',
        '/pr/getSpkItem',

        '*/page/get',
        '*/config/update',
    ];
}
