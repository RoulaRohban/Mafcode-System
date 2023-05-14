<section class="gallery-block compact-gallery">
    <div class="row no-gutters">
        @foreach($images as $image)
            <div class="col-md-6 col-lg-4 item zoom-on-hover">
                <a class="lightbox" href="{{ $image->image_url }}">
                    <img class="img-fluid image" src="{{ $image->image_url }}">
                    <span class="description">
                        <span class="description-heading">Lorem Ipsum</span>
                        <span class="description-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                    </span>
                </a>
            </div>
        @endforeach
    </div>
</section>
