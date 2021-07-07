@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <h3>@lang('posts.welcome_message')</h3>

                <form id="store-post-form" action="{{ route('posts.store') }}" method="post">
                    @csrf

                    {{--text--}}
                    <div class="form-group">
                        <input type="text" name="text" id="post-text" class="form-control" required>
                    </div>

                    <input type="file" name="image" style="display: none">
                    <input type="hidden" name="user_image_id">

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        <button class="btn btn-primary btn-sm attach-image-btn"
                                data-user-id="{{ auth()->user() ? auth()->user()->id : '' }}"
                                data-images-url="{{ route('user_images.create') }}"
                        >
                            <i class="fa fa-camera"></i>
                            @lang('posts.attach_image')
                        </button>
                    </div>

                </form><!-- end of from -->

                <div id="posts-wrapper">

                    @include('posts._index')

                </div><!-- end of wrapper -->

                <div class="d-flex justify-content-center align-items-center">
                    <div class="loader" style="display: none"></div>
                </div>

            </div><!-- end of col -->

        </div><!-- end of row -->

    </div><!-- end of container -->

@endsection