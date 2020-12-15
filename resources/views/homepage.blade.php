@extends('layouts.master')

@section('content')
	<div id="templatemo_content_container">
        <div id="templatemo_content">
            <div id="templatemo_content_left">
                @if(count($articles)>0)
				@foreach($articles as $article) 
                <div class="templatemo_post_wrapper">
                <div class="templatemo_post">
                    <div class="post_title">
                    	<a href="{{ route('post', [$article->getCategory->slug, $article->slug]) }}">{{ $article->title }}</a></div>
                    <div class="post_info">
                    	Posted by <a href="#">{{ $article->author }}</a>, {{ "on ".\Illuminate\Support\Carbon::parse($article->created_at)->format('F j, Y') }}, in <a href="{{ route('category', $article->getCategory->slug) }}">{{ $article->getCategory->name }}.</a>
                    </div>
                    <div class="post_body">
                        <img src="{{ asset('uploads/thumbnail_'.$article->image_url) }}" alt="Couldn't load image" border="1" />
                      <p>{!! $article->description !!}</p>
                  </div>
              <div class="post_comment">
                    	<a href="#">No Comment</a>
                    </div>
                </div>
                </div> <!-- End of a post-->
                @endforeach
                @else
                    <div style="font-size: 14.4px; color: #dbc1a7;"><i>No articles found.</i></div>
                @endif
                {{ $articles->links() }}
            </div> <!-- end of content left -->

        
            <div id="templatemo_content_right">
                        
                <div class="templatemo_right_section">
                	<h2>Categories</h2>
					<ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>    
                </div>
                
            </div> <!-- end of right content -->
	    </div> <!-- end of content -->
    </div> <!-- end of content container -->
@endsection
	