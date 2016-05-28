@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Welcome to #mrklog!',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

        <p>
        	You have succesfully created an account on #mrklog. The next step is to confirm your email address in order to be a certified #mrklog author!
            <br />
            Start writting...
        </p>

        <p>
        	<div style="font-weight: bold;">
        		Please click the button below to verify your email address
        	</div>
        </p>

    @include('beautymail::templates.sunny.contentEnd')

    @include('beautymail::templates.sunny.button', [
            'title' => 'Confirm email',
            'link' => 'http://mrklog.com/register/verify/' . $confirmation_code
    ])

@stop