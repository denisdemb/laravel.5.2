@if(!empty($topMenus))
    <ul>
        @foreach ($topMenus as $topMenu)
            <li >
                <a href="{{ $topMenu->link }}">{{ $topMenu->title }}</a>
                @if( isset($topMenu->children) && count($topMenu->children ) >0 )
                    @include('_partials.children', array('topMenus' => $topMenu->children))
                @endif
            </li>
        @endforeach
    </ul>
@endif