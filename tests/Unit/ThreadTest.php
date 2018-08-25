<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Thread;
use App\User;

class ThreadTest extends TestCase
{
	public function setUp()
	{
		parent::setUp();

		$this->thread = factory(Thread::class)->create();
	}

	/** @test */
	public function a_thread_has_a_replies()
	{
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
	}

	/** @test */
	public function a_thread_has_a_creator()
	{
		$this->assertInstanceOf(User::class, $this->thread->creator);
	}
}
