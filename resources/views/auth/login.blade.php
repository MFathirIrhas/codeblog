@extends('front.template')

@section('main')
	<div class="row">
		<div class="box">
			<div class="col-lg-12">
				@if(session()->has('error'))
					@include('partials/error', ['type' => 'danger', 'message' => session('error')])
				@endif	
				<hr>	
				<h2 class="intro-text text-center">Login</h2>
				<hr>
				<p>{{ trans('front/login.text') }}</p>				
				
				{!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form']) !!}	
				
				<div class="form-vertical">
                    <fieldset>
                    <div class="form-group">
                        <div class="col-lg-12">
					       {!! Form::control('text', 6, 'log', $errors, trans('front/login.log')) !!}
                       </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-12"> 
					       {!! Form::control('password', 6, 'password', $errors, trans('front/login.password')) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-12"> 
					       {!! Form::submit(trans('front/form.send'), ['col-lg-12']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-12">
					       {!! Form::check('memory', trans('front/login.remind')) !!}
                        </div>
                    </div>
                    
                    <!--<div class="form-group">
                        <div class="col-lg-12">
					       {!! Form::text('address', '', ['class' => 'hpet']) !!}
                        </div>
                    </div>	-->
                    	  
					<div class="col-lg-12">					
						{!! link_to('password/email', trans('front/login.forget')) !!}
					</div>
                    </fieldset>
				</div>
				
				{!! Form::close() !!}

				<div class="text-center">
					<hr>
						<h2 class="intro-text text-center">{{ trans('front/login.register') }}</h2>
					<hr>	
					<p>{{ trans('front/login.register-info') }}</p>
					{!! link_to('auth/register', trans('front/login.registering'), ['class' => 'btn btn-success']) !!}
				</div>

			</div>
		</div>
	</div>
@stop

