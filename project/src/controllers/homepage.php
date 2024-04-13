<?php

namespace Application\Controllers\Homepage;

class Homepage
{
    public function execute(): mixed
    {
        require('templates/homepage.php');
    }
}
