<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Thread;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class ThreadTest extends TestCase
{
	protected $thread;

	public function setUp()
	{
		parent::setUp();

		$this->thread = create(Thread::class);
	}

	/** @test */
	public function a_thread_has_a_replies()
	{
		$this->assertInstanceOf(Collection::class, $this->thread->replies);
	}

	/** @test */
	public function a_thread_has_a_creator()
	{
		$this->assertInstanceOf(User::class, $this->thread->creator);
	}

	/** @test */
	public function a_thread_can_add_a_reply()
	{
		$this->thread->addReply([
			'body' => 'foo',
			'user_id' => 1
		]);
		
		$this->assertCount(1, $this->thread->replies);
	}
}
