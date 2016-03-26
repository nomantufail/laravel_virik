<?php
/**
 * Created by PhpStorm.
 * User: JR Tech
 * Date: 3/16/2016
 * Time: 1:48 PM
 */

namespace App\Http\Responses\Interfaces;


interface ResponseInterface
{
    public function respond(array $response, array $headers = []);
    public function respondWithErrors(array $messages = []);
}