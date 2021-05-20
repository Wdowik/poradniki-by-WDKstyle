<?php

declare(strict_types=1);

namespace App;

require_once("utils/debug.php");
require_once("view.php");
require_once("Database.php");

class User
{
    private $options;

    public function __construct($request)
    {
        $request = $this->options;
        $this->account_traffic($request);

    }

    public function account_traffic()
    {
      echo "test";
    }

}