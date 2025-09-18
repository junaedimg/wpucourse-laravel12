<x-layout :title="$title">
    <article class="py-8 max-screen-md">
        <h2 class ="mb-1 text-3xl tracking-tight font-bold">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a>{{ $post['author'] }}</a> |
            {{ $post['tanggal'] }}
        </div>
        <p class='my-4 font-light'>
            {{ $post['body'] }}
        </p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">Back &laquo;</a>
    </article>
</x-layout>
