@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8" id="big-content">
                <div class=" mt-2 mb-2 pt-2 pb-2">
                    <nav class="navbar bg-info">
                <span class="list-link">
                    <a href="/new" class="text-white">Новые</a>
                    <a href="/best" class="text-white">Лучшие</a>
                    <a href="/" class="text-white">Популярные</a>
                    @if(auth()->check())
                        <a href="/tracked" class="text-white">Отслеживаемые</a>
                    @endif
                </span>
                        <a id="show-filter" href="#filter-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 version="1.1" id="Capa_1" x="0px" y="0px" width="24" height="24" viewBox="0 0 459 459"
                                 style="enable-background:new 0 0 459 459;" xml:space="preserve">
<g>
    <g id="filter">
        <path d="M178.5,382.5h102v-51h-102V382.5z M0,76.5v51h459v-51H0z M76.5,255h306v-51h-306V255z"/>
    </g>
</g>
</svg>
                        </a>
                    </nav>
                </div>
                <div class=" mb-2 pb-2" id="filter-modal" style="display: none">
                    <div class="card">
                        <nav class="navbar-nav">
                            @if(strpos(request()->path(), 'best') !== false)
                                <div class="col-3 bg-gray-light border">
                                    <form action="" class="list-group-horizontal">
                                        <ul class="nav list-group">
                                            <li>
                                                <input type="radio" name="period" value="" class="best-radio" {{ request()->path() == 'best' ? 'checked' : ''}}>
                                                <label class="mb-0" for="">
                                                    за день
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" name="period" value="week" class="best-radio" {{ request()->path() == 'best/week' ? 'checked' : ''}}>
                                                <label class="mb-0" for="">
                                                    за неделю
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" name="period" value="mouth" class="best-radio" {{ request()->path() == 'best/mouth' ? 'checked' : ''}}>
                                                <label class="mb-0" for="">
                                                    за месяц
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" name="period" value="year" class="best-radio" {{ request()->path() == 'best/year' ? 'checked' : ''}}>
                                                <label class="mb-0" for="">
                                                    за год
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" name="period" value="all" class="best-radio" {{ request()->path() == 'best/all' ? 'checked' : ''}}>
                                                <label class="mb-0" for="">
                                                    за все время
                                                </label>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            @endif
                            <div class="d-flex flex-wrap bg-gray-light border pl-4 w-100">
                                @if(isset($genres))
                                    @foreach($genres as $genre)
                                        <div class="w-25">
                                            <input type="checkbox" name="genre" class="genre-main mr-1" value="{{$genre->name}}" @if(isset(request()->all()['genre']))
                                                {{ in_array($genre->name, explode(',', request()->all()['genre'])) ? 'checked': '' }}
                                                @endif><label>{{$genre->name}}</label>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                                @if(request()->path() == 'find')
                                    <div class="pl-4 col-4">
                                        <div class="w-100">
                                            <input type="radio" name="sort" value="" class="mr-1 sort-radio"
                                                @if(isset(request()->all()['find']) && !isset(request()->all()['sort']))
                                                    checked
                                                @endif>
                                            <label for="">по схожести</label>
                                        </div>
                                        <div class="w-100">
                                            <input type="radio" name="sort" value="new" class="mr-1 sort-radio"
                                                 @if(isset(request()->all()['sort']) && request()->all()['sort'] == 'new')
                                                   checked
                                                @endif>
                                            <label for="">новые</label>
                                        </div>
                                        <div class="w-100">
                                            <input type="radio" name="sort" value="best" class="mr-1 sort-radio"
                                                  @if(isset(request()->all()['sort']) && request()->all()['sort'] == 'best')
                                                   checked
                                                @endif>
                                            <label for="">лучшие</label>
                                        </div>
                                    </div>
                                @endif
                        </nav>
                    </div>
                </div>
                @include('inc.post')
                @if($reviews->isNotEmpty() && $reviews->total()>10)
                    @if(isset(request()->all()['find']))
                        <a id="show-more-rew" class="infinite-more-link w-100 btn btn-light" href="?find={{ request()->all()['find'] }}&page=2">More</a>
                    @elseif(isset(request()->all()['genre']) && !isset(request()->all()['find']))
                        <a id="show-more-rew" class="infinite-more-link w-100 btn btn-light" href="?genre={{ request()->all()['genre'] }}&page=2">More</a>
                    @elseif(isset(request()->all()['genre']) && !isset(request()->all()['find']))
                        <a id="show-more-rew" class="infinite-more-link w-100 btn btn-light" href="?find={{ request()->all()['find'] }}&genre={{request()->all()['genre']}}&page=2">More</a>
                    @else
                        <a id="show-more-rew" class="infinite-more-link w-100 btn btn-light" href="?page=2">More</a>
                    @endif
                @endif
            </div>
            @include('inc.sidebar')
        </div>
    </div>
    <div id="rightcolumn" style="display:none;">
        <i class="fas fa-angle-up"></i>
    </div>
@endsection
