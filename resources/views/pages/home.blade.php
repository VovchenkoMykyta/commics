@extends('welcome')

@section('main')
    <div class="tags-filter-wrapper">
        @if(count($page['tags']))
            <div class="tags-filter-container">
                @foreach($page['tags'] as $tag)
                    <div class="tag-container">
                        <div class="tag-filter">
                            <a href="{{ route("filter-by-tag", ['tag' => $tag->id]) }}">{{ $tag->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="comics-wrapper">
        <div class="comics-container">
            @if(count($page['comics']))
                @foreach($page['comics'] as $comics)
                    <div class="comics-card">
                        <div class="comics-head">

                        </div>
                        <div class="comics-body">
                            <div class="comics-body-cover">
                                <img style="max-width: 250px" src="{{asset('storage/'.$comics->photos->first()->url)}}" alt="cover">
                            </div>
                        </div>
                        <div class="comics-footer">
                            <a href="#">
                                {{ $comics->name }}
                            </a>

                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

<h2>Discover Amazing Comics</h2>
<p>Explore a diverse collection of comics that cater to every taste and genre.</p>
<p>Start your adventure into the ComicVerse!</p>
@endsection
