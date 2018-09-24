<h2>{{ $title }}</h2>
<ol class="breadcrumb">
    @if (Auth::check())
        <li><a href="{{ route(Auth::user()->getRole().'.index') }}">{{ $parent }}</a></li>
    @endif
    <li class="active">{{ $active }}</li>
</ol>