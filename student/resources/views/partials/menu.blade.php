@if(count($categories) >0)
    <ul class="header__menu">
        @foreach($categories as $category)
            <li>
                <a class="header__menu-link" href="{{url('category', [$category->id, str_slug($category->title)])}}">{{$category->title}}</a>
            </li>
        @endforeach
    </ul>
@endif