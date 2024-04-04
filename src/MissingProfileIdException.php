<?php

namespace Bleckert\OpenpanelLaravel;

use Exception;

class MissingProfileIdException extends Exception
{
    public function __construct()
    {
        parent::__construct('Missing profile ID', 412);
    }
}