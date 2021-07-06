@foreach ($replies as $reply)
    <div class="media mt-3">
        <a class="pr-3" href="#">
            <img src="{{ asset('images/default.png') }}" style="width: 50px;" alt="Generic placeholder image">
        </a>
        <div class="media-body">

            <h5 class="mt-0">{{ $reply->user ? $post->user->name : __('posts.anonymous_user') }}</h5>

            @if ($reply->hasImage)
                <img src="{{ $reply->image_path }}" style="max-width: 100%;" alt="">
            @endif

            <p class="mb-0">{{ $reply->text }}</p>

            <div class="d-flex justify-content-between">
                @if ($level == 5)
                    <p class="mb-0">@lang('posts.can_not_reply')</p>
                @else
                    <a href="#" class="reply-link">@lang('posts.reply')</a>
                @endif
                <p class="mb-1">{{ $post->created_at->diffForHumans() }}</p>
            </div>

            <form action="{{ route('posts.store') }}" method="post" class="store-reply-form" style="display: none">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                    <input type="text" name="text" class="form-control" id="" required>
                    <input type="file" name="image" style="display: none">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> @lang('site.add')</button>
                    <button class="btn btn-primary btn-sm attach-image-btn" data-user-id="{{ auth()->user() ? auth()->user()->id : '' }}"><i class="fa fa-camera"></i> @lang('posts.attach_image')</button>
                </div>
            </form>

            @if ($reply->hasReplies())
                @include('posts._replies', ['replies' => $reply->replies, 'level' => $level+1])
            @endif
        </div>
    </div>
@endforeach