<ul>
    @foreach($posts as $post)
    <li> {{ $post->title }} </li>
    @endforeach

        {{ $posts->links() }}
</ul>
