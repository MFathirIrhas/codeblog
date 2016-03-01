@extends('front.template')

@section('main')
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr>
				<h2 class="intro-text text-center"><strong>Welcome to My Blog</strong></h2>
				<hr>
				<p>This Blog is just another Personal Blog. Subscribe to join and follow any update from me.
                <blockquote>
                    <p>"Yesterday you said Tomorrow, Just DO it, Just DO it!!!"
                    <small>Shia Lebeouf</small>
                </blockquote>
			</div>
		</div>

	</div>
	</br>
	</br>
	</br>
	</br>
	<div class="row">
		<div class="box">
			<hr>
			<h1 class="intro-text text-center"><strong><span class="label label-success">&#8659 Latest Posts &#8659 </span></strong></h1>
			<hr>
			@foreach($posts as $post)
            <div class="box">
                <div class="col-lg-12 text-center">
                    <h2>{{ $post->title }}
                    <br>
                    <small>{{ $post->user->username }} {{ trans('front/blog.on') }} {!! $post->created_at . ($post->created_at != $post->updated_at ? trans('front/blog.updated') . $post->updated_at : '') !!}</small>
                    </h2>
                </div>
                <div class="col-lg-12">
                    <p>{!! $post->summary !!}</p>
                </div>
                <div class="col-lg-12 text-center">
                    {!! link_to('blog/' . $post->slug, trans('front/blog.button'), ['class' => 'btn btn-primary btn-sm']) !!}
                    <hr>
                </div>
            </div>
        	@endforeach
  		</div>
 	</div>
	
@stop


