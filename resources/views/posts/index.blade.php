@extends('layouts.app')

@section('content')
 <div class="flex justify-center">
 <div class="w-8/12 bg-white p-6 rounded-lg">
    @auth
    <form action="{{ route('posts') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="body" class="sr-only">Body</label>
            <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') boder-red-500 @enderror"
            placeholder="Post something"></textarea>

            @error('body')
            <div class="text-red-500 mt-2 text-sm"> {{ $message }} </div>
            @enderror
        </div>
        <div>
            <button type="submit" class="rounded bg-blue-500 text-white px-4 py-2 font-medium mb-5">Post</button>
        </div>
    </form>
    @endauth
    @if ($posts->count())
        @foreach ($posts as $post)
            <x-post :post="$post"/>
        @endforeach

        {{ $posts->links() }}
    @else
        <p>
            There are no posts
        </p>
    @endif
 </div>
@endsection
