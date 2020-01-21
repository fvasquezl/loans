<div class="card-header ">
    <h5>
        <i class="far fa-file-alt mr-1"></i>
        {{ $post->title }}
    </h5>
    <div class="d-flex justify-content-between">
        <div class="text-muted mt-1"><i class="fas fa-user"></i> {{$post->present()->owner()}} /
            <i class="fas fa-calendar-alt"></i> {{ $post->present()->publishedAt() }}
        </div>
        <div>
            <a href="{{ route('categories.show',$post->category) }}" class="btn btn-success btn-flat">
                {{ $post->present()->category() }}
            </a>
        </div>
    </div>
</div>
