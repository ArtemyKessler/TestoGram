@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <img src="{{ $post->user->profile->profileImage() }}"
                    class="rounded-circle w-100"
                    style="max-width: 40px">
                <h5 class="pl-2 font-weight-bold">
                    <a href="../profile/{{$post->user->id}}">
                        <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                    <a href="#" class="pl-3">Follow</a>
                </h5>
            </div>
            <hr>
            <div class="pt-3">
                <span class="font-weight-bold">
                    <a href="../profile/{{$post->user->id}}">
                       <span class="text-dark">{{ $post->user->username }}</span>
                    </a>
                </span>
                    {{ $post->caption }}
            </div>

            <div class="pt-4 overflow-auto" style="max-height: 540px">
                @foreach ($post->comments as $comment)
                    <div class="p-2 d-flex">
                        <a href="/profile/{{ $comment->profile->id }}">
                            <div class="font-weight-bold text-dark">
                                {{ $comment->profile->title }}
                            </div>
                        </a>
                        <div class="ml-1 flex-grow-1">
                            {{ $comment->text }}
                        </div>
                        @can('update', $comment->profile)
                            <form
                                action="/p/{{ $post->id }}/comment/{{ $comment->id }}"
                                method="POST"
                                class="align-self-start pr-2 py-1">
                                @csrf
                                <button
                                    class="p-0 m-0"
                                    style="border: 0px; background-color: inherit">
                                    ✕
                                </button>
                            </form>
                        @endcan
                    </div>
                @endforeach
            </div>

            <div>
                <form class="d-flex align-items-center"
                    action="/p/{{ $post->id }}/comment"
                    method="post">
                    @csrf
                    <textarea
                        name="text"
                        id="comment-text"
                        cols="25"
                        rows="3"
                        placeholder="Comment text...@error('text') {{ $message }} @enderror">
                    </textarea>

                    <button class="btn btn-primary ml-3">
                        Comment
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
