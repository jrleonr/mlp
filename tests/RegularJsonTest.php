<?php

use App\Migration\RegularJson;

class RegularJsonTest extends PHPUnit_Framework_TestCase
{

    public function testHasNoData()
    {
        $regularJson = new RegularJson;

        

        $this->assertEquals('Not data provided', $regularJson->migrate());
    }
}
