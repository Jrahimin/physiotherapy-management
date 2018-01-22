@extends('layouts.app')

@section('style')
h1, h3{text-align:center;color:black;}
@endsection

@section('title')

	@if (Auth::user())
			মূলপাতা
		@else
			লগইন
	@endif
	
@endsection


@section('content')

@if (Auth::user())
	
<div class="container">
    <br/><br/><br/>
		
		<div class="welcome">
			 <br/><br/>
				 <h1>
						স্বাগতম!
				 </h1>
				 <h3>
					আপনার কাঙ্খিত সেবার জন্য মেনুতে ক্লিক করুন
				 </h3>
		</div>
	
	<br/><br/><br/>
</div>
	
	@else
		
<div class="container">

<br/><br/><br/>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
					<p class="formheading">
						লগ ইন
					</p>
				</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">ই-মেইল</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">পাসওয়ার্ড</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> মনে রাখুন
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
											লগইন
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
											পাসওয়ার্ড ভুলে গেছেন?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<br/><br/><br/>
</div>
	
@endif

@endsection
