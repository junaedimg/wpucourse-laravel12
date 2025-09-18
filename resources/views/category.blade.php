<x-layout :title="$title">
    @foreach ($posts as $post)
        <article class="py-8 max-screen-md border-b border-gray-300">
            <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                <h2 class ="mb-1 text-3xl tracking-tight font-bold">{{ $post['title'] }}</h2>
            </a>
            <div class="text-base text-gray-500">
                By <a href="/author/{{ $post->author->username }}" class="text-gray-900 hover:underline">
                    {{ $post->author->name }}</a>
                In
                <a href="/category/{{ $post->category->slug }}" class="text-gray-900 hover:underline">
                    {{ $post->category->name }}</a>
                | {{ $post['tanggal'] }}
            </div>
            <p class='my-4 font-light'>
                {{ Str::limit($post['body'], 30) }}
            </p>
            <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read More &raquo;</a>
        </article>
    @endforeach
</x-layout>
