<div class="row d-flex justify-content-center py-5 px-2">
    <div class="card-body p-4">
        <div class="container d-flex justify-content-between">
            <span id="sub-title" class="m-1">
                @lang('app.reviews.total'):
                <span>
                    {{ $viewData['reviewCount'] }}
                </span>
            </span>
            @guest
            <a href="{{ route('login') }}" type="button" class="btn btn-outline">@lang('app.reviews.new')</a>
            @else
            <button type="button" class="btn btn-outline" id="newCommentButton">@lang('app.reviews.new')</button>
            @endguest
        </div>
        <div id="newCommentBox" style="display: none">
            <form @if (Request::segment(1)=='toy' ) action="{{ route('review.save', ['type' => 'toy', 'id' => $viewData['toy']->getId()]) }}" @else action="{{ route('review.save', ['type' => 'technique', 'id' => $viewData['technique']->getId()]) }}" @endif method="POST">
                @csrf
                <div class="card m-2">
                    <div class="card-body d-flex justify-content-between">
                        <div class="row">
                            <textarea class="mx-3" name="comment" id="comment-text" cols="30" rows="10" placeholder="@lang('app.reviews.review')" required></textarea>
                            <input name="rating" class="mx-3" type="number" placeholder="@lang('app.reviews.rating')" min="0" max="5" id="rating-text" required>
                            <div class="my-3" id="review-submit">
                                <button class="btn btn-outline" type="submit">@lang('app.reviews.submit')</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @foreach ($viewData['reviews'] as $review)
        <div class="card m-2">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between">
                    <p>{{$review->getComment()}}</p>
                    <p class="mb-0"><i class="fa-solid fa-star"></i> {{$review->getRating()}}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-start">
                        <p class="small mb-0">{{$review->getUser()->getName()}} <small>{{ $review->getUpdated_at() }}</small></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script src="{{ asset('js/app.js') }}" crossorigin="anonymous"></script>
</div>