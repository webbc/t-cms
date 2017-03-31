<?php
/**
 * Created by PhpStorm.
 * User: ty
 * Date: 2017/3/30 0030
 * Time: 下午 8:31
 */

namespace App\Exceptions;


use Symfony\Component\HttpKernel\Exception\HttpException;

class LoginFailed extends HttpException
{
    private $error;

    public function __construct($error, $statusCode = 403)
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }
}