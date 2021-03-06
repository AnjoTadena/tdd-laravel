<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;
use App\User;

class Thread extends Model
{
	protected $guarded = [];

    public function path()
    {
    	return '/threads/' . $this->id;
    }

	public function replies()
	{
		return $this->hasMany(Reply::class);
	}

	public function creator()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function creatorName()
	{
		return $this->creator->name;
	}

	public function addReply($request)
	{
		$this->replies()->create($request);
	}
}
