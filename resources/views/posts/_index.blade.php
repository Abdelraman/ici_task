@forelse ($posts as $post)
    <div class="media mb-3">
        <img class="mr-3" src="{{ asset('images/default.png') }}" style="width: 50px;" alt="Generic placeholder image">
        <div class="media-body">
            <h5 class="mt-0">{{ $post->user ? $post->user->name : __('posts.anonymous_user') }}</h5>

            @if ($post->hasImage)
                <img src="{{ $post->image_path }}" style="max-width: 100%;" alt="">
            @endif

            <p class="mb-0 mt-2">{{ $post->text }}</p>

            <div class="d-flex justify-content-between">
                <a href="#" class="reply-link">@lang('posts.reply')</a>
                <p class="mb-1">{{ $post->created_at->diffForHumans() }}</p>
            </div>

            <form action="{{ route('posts.store') }}" method="post" class="store-reply-form" style="display: none">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="parent_id" value="{{ $post->id }}">
                    <input type="text" name="text" class="form-control" id="" required>
                    <input type="file" name="image" style="display: none">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> @lang('site.add')</button>
                    <button class="btn btn-primary btn-sm attach-image-btn" data-user-id="{{ auth()->user() ? auth()->user()->id : '' }}"><i class="fa fa-camera"></i> @lang('posts.attach_image')</button>
                </div>
            </form>

            @if ($post->hasReplies())

                @include('posts._replies', ['replies' => $post->replies, 'level' => 2])

            @endif
        </div>
    </div>
    <hr>
@empty
    <h4>@lang('site.no_data_found')</h4>
@endforelse