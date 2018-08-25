<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends TestCase
{
	use DatabaseMigrations;

  	// A user can view all threads
	/** @test */
	public function a_user_can_view_all_threads()
	{
		// arrange
		$thread = factory(\App\Thread::class)->create();

		$response = $this->get('threads');

		// assert
		$response->assertSee($thread->title);

	}

	// A user can view thread
	/** @test */
	public function a_user_can_view_thread()
	{
		$thread = factory(\App\Thread::class)->create();

		$response = $this->get('threads/' . $thread->id);

		$response->assertSee($thread->title);
	}
}
