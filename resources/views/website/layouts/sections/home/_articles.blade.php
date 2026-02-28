<section class="articles my-5 py-5" dir="ltr">
    <div class="container">

        <h2 class="articles-title main-font main-color @if (app()->getLocale() == 'ar') text-center @endif">
            {{ __('messages.articles') }}</h2>
        <hr />

        @if (isset($posts) && $posts->count())
            <div class="articles-slider owl-carousel owl-theme">
                @foreach ($posts as $post)
                    <div class="card rounded-0">

                        <!-- Favorite Heart -->
                        <form class="favorite-form d-inline-block" data-post-id="{{ $post->id }}"
                            action="{{ route('website.posts.favorite', $post->id) }}" method="POST">
                            @csrf
                            <button type="button" class="articles-love border-0">
                                <i
                                    class="{{ auth('website')->check() && auth('website')->user()->posts->contains($post->id) ? 'fas' : 'far' }} fa-heart"></i>
                            </button>
                        </form>

                        <!-- Post Image -->
                        <img src="{{ $post->photo_url }}" class="card-img-top w-50 d-block mx-auto"
                            alt="{{ $post->title }}" />

                        <div class="card-body">
                            <h5 class="card-title main-font main-color text-center">
                                {{ $post->title }}
                            </h5>
                            <p class="card-text main-font text-center">
                                {{ Str::limit(strip_tags($post->content ?? ($post->body ?? '')), 120) }}
                            </p>
                            <a href="{{ route('website.posts.show', $post->id) }}"
                                class="articles-details main-font btn rounded-0 d-block mx-auto">{{ __('messages.details') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center">{{ __('messages.no_articles') ?? 'No articles available.' }}</p>
        @endif

    </div>
</section>

@push('scripts')
    <script>
        $(document).ready(function() {

            // CSRF setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Toggle favorite (AJAX)
            $('.favorite-form button').click(function() {
                let btn = $(this);
                let form = btn.closest('.favorite-form');
                let url = form.attr('action');

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: form.serialize(),
                    success: function() {
                        // دعم i أو SVG
                        let icon = btn.children().first(); // أول عنصر جوه الزر
                        if (icon.hasClass('far') || icon.attr('data-prefix') === 'far') {
                            // Toggle to solid
                            icon.removeClass('far').addClass('fas');
                            icon.attr('data-prefix', 'fas'); // لو SVG
                        } else {
                            // Toggle to outline
                            icon.removeClass('fas').addClass('far');
                            icon.attr('data-prefix', 'far'); // لو SVG
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        alert('حدث خطأ، حاول مرة أخرى');
                    }
                });
            });

        });
    </script>
@endpush
