<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Thread;
use App\Reply;

class ReadThreadTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory(Thread::class)->create();
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
        $this->get('threads/' . $this->thread->id)
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_all_replies_asssociated_with_the_thread()
    {
        $reply = factory(Reply::class)->create(['thread_id' => $this->thread->id]);

        $this->get('threads/' . $this->thread->id)
            ->assertSee($reply->body);
    }
}