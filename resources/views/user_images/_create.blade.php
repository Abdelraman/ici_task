<div class="dropzone" id="dz"></div>

<div class="row" id="images" style="margin-top: 20px">
    @foreach (auth()->user()->images as $image)

        <div class="col-md-3" style="margin-top: 10px" id="{{ $image->id }}">
            <div class="user-images-container">
                <img src="{{ $image->image_path }}" class="img-thumbnail" alt=""/>
                <div class="overlay">
                    <button class="btn btn-danger btn-sm delete-user-image-btn"
                            data-id="{{ $image->id }}"
                            data-url="{{ route('user_images.destroy', $image->id) }}"
                    >
                        <i class="fa fa-trash"></i> @lang('site.delete')
                    </button>
                </div>
            </div>
        </div>

    @endforeach
</div>

<script>

    //dropzone
    var myDropzone = new Dropzone("#dz", {
        url: "{{ route('user_images.store') }}",
        dictDefaultMessage: "{{ __('site.drop_images') }}",
        params: {'_token': '{{ csrf_token() }}'},
        complete: function (file) {
            myDropzone.removeFile(file)
        },
        success: function (file, image) {

            // var lang = $(location).attr('href').split("/")[3];

            {{--            let productId = "{{ $product->id }}";--}}
            let deleteText = "@lang('site.delete')";

            console.log(image);

            let html = `
                <div class="col-md-3" style="margin-top: 10px" id="${image.id}">
                    <div class="user-images-container">
                        <img src="${image.image_path}" class="img-thumbnail" alt=""/>
                        <div class="overlay">
                            <button class="btn btn-danger btn-sm delete-user-image-btn" data-id="${image.id}" data-url="/user_images/${image.id}">
                                <i class="fa fa-trash"></i> ${deleteText}
                            </button>
                        </div>
                    </div>
                </div>
                `

            $('#images').append(html);
        },
        error: function (file, error) {

            let errors = error['errors'];
            $.each(errors, function (key, val) {

                new Noty({
                    type: 'error',
                    layout: 'topRight',
                    text: val,
                    timeout: 2000,
                    killer: true
                }).show();

            });
        }
    });

</script>