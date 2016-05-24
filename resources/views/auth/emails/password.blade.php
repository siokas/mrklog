{{-- Hello form mrklog.com,

Click here to reset your password: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a> --}}

@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Hello from mrklog.com!',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

        <p>
        	#This is a reminder email for your password in mrklog.com. 
        </p>

        <p>
        	<div style="font-weight: bold;">
        		Click the button below to reset your password
        	</div>
        </p>

    @include('beautymail::templates.sunny.contentEnd')

    @include('beautymail::templates.sunny.button', [
            'title' => 'Reset Password',
            'link' => url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset())
    ])

@stop
