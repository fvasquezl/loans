@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            @if(isset($title))
            <h4 class="mb-3">{{ $title }}</h4>
            @endif

            @foreach ($posts as $post)
            <div class="card shadow p-2  mb-4 card-outline card-primary">
                @include('posts.partials.header')

                <div class="card-body">
                    <p class="card-text">{!! $post->excerpt !!}</p>
                    <p>
                        <a href="{{ route('posts.show',$post) }}" class="text-uppercase text-info h4 font-weight-bold">
                            Leer M&aacute;s</a>
                    </p>
                    @include('posts.partials.footer')
                </div>
            </div>
            @endforeach
            {{-- {{ $posts->render() }} --}}
        </div>
    </div>
</div>
</div>
@endsection
