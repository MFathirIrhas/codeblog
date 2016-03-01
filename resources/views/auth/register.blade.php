@extends('front.template')

@section('main')
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				<hr>	
				<h2 class="intro-text text-center">{{ trans('front/register.title') }}</h2>
				<hr>
				<p>{{ trans('front/register.infos') }}</p>		

				{!! Form::open(['url' => 'auth/register', 'method' => 'post', 'role' => 'form']) !!}	

					<div class="row">
						{!! Form::control('text', 6, 'username', $errors, trans('front/register.pseudo'), null, [trans('front/register.warning'), trans('front/register.warning-name')]) !!}
						{!! Form::control('email', 6, 'email', $errors, trans('front/register.email')) !!}
					</div>
					<div class="row">	
						{!! Form::control('password', 6, 'password', $errors, trans('front/register.password'), null, [trans('front/register.warning'), trans('front/register.warning-password')]) !!}
						{!! Form::control('password', 6, 'password_confirmation', $errors, trans('front/register.confirm-password')) !!}
					</div>
					<!--{!! Form::text('address', '', ['class' => 'hpet']) !!}	-->
					<p><i><font color="red">*After you press "enter" or "send" button below, your record had been saved to our database, but you will not be redirected to successful state as it should be because email service for registration doesn't work for now. You can contact me to Confirm your registration by informing me in contact menu telling yourself as "needed to be confirmed". I will send email once your registration is confirmed.</font></i></p>
					<p><i><font color="red">*I am really sorry for this inconvenience, we will try to fix this email service for registration as soon as we can. Thank you.</font></i></p>
					<div class="row">	
						{!! Form::submit(trans('front/form.send'), ['col-lg-12']) !!}
					</div>
					
				{!! Form::close() !!}

				<p align="right"><a href="login" class="btn btn-primary">Login &raquo</a></p>
			</div>
		</div>
	</div>
@stop

@section('scripts')

	<script>
		$(function() { $('.badge').popover();	});
	</script>

@stop