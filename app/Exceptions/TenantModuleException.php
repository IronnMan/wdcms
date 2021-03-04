<?php


namespace App\Exceptions;


use Symfony\Component\HttpKernel\Exception\HttpException;

class TenantModuleException extends HttpException
{
    public function __construct($message = "")
    {
        parent::__construct(403, $message);
    }
}
