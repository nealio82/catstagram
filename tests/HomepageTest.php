<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomepageTest extends TestCase
{
    /**
     * Test the homepage contains some basic text. A nice simple test case to get us going :)
     *
     * @return void
     */
    public function testHomepageText()
    {
        $this->visit('/')
            ->see('Catstagram');
    }
}
