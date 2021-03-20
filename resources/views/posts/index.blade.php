@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
        <div class="row pb-4">
            <div class="col-6 offset-3">
                <a href="p/{{ $post->id }}">
                    <img
                        src="/storage/{{ $post->image }}"
                        class="w-100">
                </a>
                <div class="p-2" style="background-color: whitesmoke">
                    <span class="font-weight-bold">
                        <a href="../profile/{{$post->user->id}}">
                            <span class="text-dark">
                                {{ $post->user->username }}:
                            </span>
                        </a>
                    </span>
                        {{ $post->caption }}
                </div>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
