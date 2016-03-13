<ul class="nav navbar-nav">
    @foreach($tags = create_nav() as $tag)
        <li @if (Request::is("/subject/{{$tag->id}}")) class="active" @endif>
            <a href="/subject/{{$tag->id}}">{{$tag->name}}</a>
        </li>
    @endforeach
</ul>
