<?php

namespace App\Contracts;

interface URLInterface
{
    public function list();
    public function shorten();
    public function redirect();
}
