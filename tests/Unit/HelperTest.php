<?php

namespace Tests\Unit;

use App\Http\Controllers\Controller;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_limit_feature()
    {
        $limit = rand(0, 100);
        $controller = new Controller();
        $result = $controller->getLimit($limit);

        $this->assertLessThanOrEqual($controller::LIMIT, $result);
    }
}
