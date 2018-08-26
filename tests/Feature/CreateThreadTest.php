<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Thread;

class CreateThreadTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();
	}

	/** @test */
	public function an_unauthenticated_user_cannot_create_a_thread()
	{
		$this->withExceptionHandling();

		$this->get('/threads/create')
			->assertRedirect('/login');

		$this->post('/threads', [])
			->assertRedirect('/login');
	}

	/** @test */
	public function an_authenticated_user_can_create_a_thread()
	{
		// User must be signin
		$this->signIn();

		$thread = make(Thread::class);

		$this->post('/threads', $thread->toArray());

		$this->get($thread->path())
			->assertSee($thread->title)
			->assertSee($thread->body);
	}
}
