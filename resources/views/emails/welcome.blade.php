@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Hello from mrklog.com!',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

        <p>
        	Thanks for creating an accountThanks for creating an accountThanksThanks for creating an accountThanksThanks for creating an account
        	Thanks for creating an account
        	Thanks for creating an accountThanksThanks for creating an account
        	Thanks for creating an accountThanksThanks for creating an accountThanksThanks
        	Thanks for creating an accountThanksThanks
        	v;s
        </p>

        <p>
        	<div style="font-weight: bold;">
        		Please click the button below to verify your email address
        	</div>
        </p>

    @include('beautymail::templates.sunny.contentEnd')

    @include('beautymail::templates.sunny.button', [
            'title' => 'Confirm email',
            'link' => 'http://mrklog.dev/register/verify/' . $confirmation_code
    ])

@stop