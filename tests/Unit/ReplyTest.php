<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Thread;
use App\Reply;
use App\User;

class ReplyTest extends TestCase
{
	use DatabaseMigrations;
	
	public function setUp()
	{
		parent::setUp();

		$this->thread = factory(Thread::class)->create();
	}

	/** @test */
	public function it_should_have_an_owner()
	{
		$reply = factory(Reply::class)->create(['thread_id' => $this->thread->id]);

		$this->assertInstanceOf(User::class, $reply->owner);
	}
}
