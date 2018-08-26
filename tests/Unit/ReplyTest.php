<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Thread;
use App\Reply;
use App\User;

class ReplyTest extends TestCase
{
	protected $thread;

	public function setUp()
	{
		parent::setUp();

		$this->thread = create(Thread::class);
	}

	/** @test */
	public function it_should_have_an_owner()
	{
		$reply = create(Reply::class, ['thread_id' => $this->thread->id]);

		$this->assertInstanceOf(User::class, $reply->owner);
	}
}
