<h2>{{ $title }}</h2>
<ol class="breadcrumb">
    <li><a href="{{ route(Auth::user()->getRole().'.index') }}">{{ $parent }}</a></li>
    <li class="active">{{ $active }}</li>
</ol>