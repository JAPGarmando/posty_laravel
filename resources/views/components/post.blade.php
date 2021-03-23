@props(['post' => $post])
<div>
    <a href="{{ route('userposts', $post->user) }}" class="font-bold"> {{ $post->user->name }} </a> <span class="text-gray-600 text-sm"> {{ $post->created_at->diffForHumans() }} </span>
    <p class="mb-2">{{ $post->body }}</p>
</div>

@can('delete', $post)

    <form action="{{  route('posts.destroy', $post) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500">Delete</button>
    </form>
@endcan


<div class="flex items-center mb-5">
    @auth

    @if (!$post->likedBy(auth()->user()))
    <form action=" {{ route('posts.likes', $post)}} " method="post" class="mr-1">
        @csrf
        <button type="submit" class="text-blue-500 font-bold">Like</button>
    </form>
    @else
    <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-blue-500 font-bold">Unlike</button>
    </form>
    @endif
    @endauth
    <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }} </span>
</div>
