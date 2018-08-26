<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Thread;
use App\Reply;
use Illuminate\Auth\AuthenticationException;

class ParticipateInForumTest extends TestCase
{
	/** @test */
	public function unauthenticated_user_cannot_participate_in_forum()
	{
		$this->expectException(AuthenticationException::class);

		$this->post('threads/1/replies', []);
	}

	/** @test */
	public function an_authenticated_user_may_participate_in_forum_threads()
	{
		// authenticate user
		$this->signIn($user = create(User::class));

		// view thread
		$thread = create(Thread::class);

		// create a reply to a thread
		$reply = create(Reply::class);

		// URL: threads/{thread}/replies
		$this->post($thread->path() . '/replies', $reply->toArray());

		$this->get($thread->path())
			->assertSee($reply->body);
	}
}
