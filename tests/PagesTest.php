<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Page;
class PagesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_pages_list()
    {
    	// Having
    	Page::create(['name' => 'My first page', 'slug' => rand(1000,9999)]);
    	Page::create(['name' => 'Second page', 'slug' => rand(1000,9999)]);

    	// When
    	$this->visit('pages')
    		// Then
    		->see('My first page')
    		->see('Second page');
    }
}
