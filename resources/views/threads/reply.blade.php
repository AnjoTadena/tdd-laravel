<div class="row justify-content-center" style="margin-top: 25px;">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <a href="#">{{ $reply->owner->name }}</a>
                said
                {{ $reply->created_at->diffForHumans() }}
            </div>
            <div class="card-body">
                {{ $reply->body }}
            </div>
        </div>
    </div>
</div>