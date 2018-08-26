<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Thread;
use App\Reply;

class ReadThreadTest extends TestCase
{
    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = create(Thread::class);
    }

    // A user can view all threads
    /** @test */
    public function a_user_can_view_all_threads()
    {
        $this->get('threads')
            ->assertSee($this->thread->title);
    }

    // A user can view thread
    /** @test */
    public function a_user_can_view_thread()
    {
        $this->get($this->thread->path())
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_all_replies_asssociated_with_the_thread()
    {
        $reply = create(Reply::class, ['thread_id' => $this->thread->id]);

        $this->get($this->thread->path())
            ->assertSee($reply->body);
    }
}
