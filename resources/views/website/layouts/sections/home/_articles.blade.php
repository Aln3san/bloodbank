<section class="articles my-5 py-5" dir="ltr">
    <div class="container">

        <h2 class="articles-title main-font main-color @if(app()->getLocale() == 'ar') text-start @endif">{{ __('messages.articles') }}</h2>
        <hr />

        @if (isset($posts) && $posts->count())
            <div class="articles-slider owl-carousel owl-theme">
                @foreach ($posts as $post)
                    <div class="card rounded-0">
                        <a href="#" class="articles-love"><i class="fa-regular fa-heart"></i></a>
                        <img src="{{ $post->photo_url }}" class="card-img-top w-50 d-block mx-auto" alt="{{ $post->title }}" />
                        <div class="card-body">
                            <h5 class="card-title main-font main-color text-center">
                                {{ $post->title }}
                            </h5>
                            <p class="card-text main-font text-center">
                                {{ Str::limit(strip_tags($post->content ?? ($post->body ?? '')), 120) }}
                            </p>
                            <a href="{{ url('posts/' . $post->id) }}"
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
