@extends('front.template')

@section('main')
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr>
				<h2 class="intro-text text-center"><strong>Welcome to My Blog</strong></h2>
				<hr>
				<p><big>Hello</big> and welcome to my personal blog, <big>CodeBlog</big>. This is an non-profit blog sharing all posts about what I've learned and experienced from many kind of subjects.
				there are many kind of topics that will be shared here such as <big>Programming</big>, <big>Life, Religion</big>, <big>Politics</big>(perhaps), <big>local</big> and <big>international</big> news, <big>Gaming</big>, <big>tutorials</big>, and many other. 
				I'll share whatever I know from those topics because I know a wise man said that:</p>
				<blockquote>
					<p>"Sharing is Caring"</p>
					<small>-Someone wise</small>
				</blockquote>
				
				<p>You can subscribe my blog by registering yourself through login menu, but <i>for now</i> there still an issue in email service for registration, so you'll not receive any email confirmation, <big>but</big> all of your records had been saved to the database 
				and ready to be confirmed. I would reccommend you to contact me after you registered yourself, so that I can immediately confirm your registration if you really need to subscribe and comment to whatever posts I shared. 
				If you are not willingly to subscribe/register, and have any question, you can always contact me through contact menu above.</p>
				
				<p>I hope you enjoy reading everything I shared and hope they are beneficial for you. You can share what you've read to <big>Facebook</big>,<big>Twitter</big>,and <big>Google plus.</big></p>
				<p><small>Kindly Regards,<br>Fathir</small></p>

                <hr>
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
 	
 	</br>
 	</br>
 	<div>
 	<p align="center">
 	Share this Site:
 		<a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url=http%3A%2F%2Fkoshk.dev&pubid=USERNAME&ct=1&title=AddThis%20-%20Get%20likes%2C%20get%20shares%2C%20get%20followers&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/facebook.png" border="1" alt="Facebook"/></a>
		<a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url=http%3A%2F%2Fkoshk.dev&pubid=USERNAME&ct=1&title=AddThis%20-%20Get%20likes%2C%20get%20shares%2C%20get%20followers&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/twitter.png" border="1" alt="Twitter"/></a>
		<a href="https://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url=http%3A%2F%2Fkoshk.dev&pubid=USERNAME&ct=1&title=AddThis%20-%20Get%20likes%2C%20get%20shares%2C%20get%20followers&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/google_plusone_share.png" border="1" alt="Google+"/></a>
 	</p>
 	</div>
	
@stop


