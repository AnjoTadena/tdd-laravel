<?php

function make($model, $attributes = [])
{
	return factory($model)->make($attributes);
}

function create($model, $attributes = [])
{
	return factory($model)->create($attributes);
}
