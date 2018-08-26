<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Thread;
use App\Reply;

class ParticipateInForumTest extends TestCase
{
	/** @test */
	public function unauthenticated_user_cannot_participate_in_forum()
	{
		$this->expectException('Illuminate\Auth\AuthenticationException');

		$this->post('threads/1/replies', []);
	}

	/** @test */
	public function an_authenticated_user_may_participate_in_forum_threads()
	{
		// authenticate user
		$this->signIn($user = factory(User::class)->create());

		// view thread
		$thread = factory(Thread::class)->create();

		// create a reply to a thread
		$reply = factory(Reply::class)->make();

		// URL: threads/{thread}/replies
		$this->post($thread->path() . '/replies', $reply->toArray());

		$this->get($thread->path())
			->assertSee($reply->body);
	}
}
