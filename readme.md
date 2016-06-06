
# Mrklog

[![Build Status](https://travis-ci.org/siokas/mrklog.svg?branch=master)](https://travis-ci.org/siokas/mrklog)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/364b00ef32d74d068c84ffb1b8b204ac)](https://www.codacy.com/app/apostolossiokas/mrklog?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=siokas/mrklog&amp;utm_campaign=Badge_Grade)
[![Join the chat at https://gitter.im/siokas/mrklog](https://badges.gitter.im/siokas/mrklog.svg)](https://gitter.im/siokas/mrklog?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Coverage Status](https://coveralls.io/repos/github/bfontaine/badges2svg/badge.svg?branch=master)](https://coveralls.io/github/bfontaine/badges2svg?branch=master)
[![js-standard-style](https://img.shields.io/badge/code%20style-standard-brightgreen.svg)](http://standardjs.com/)
[![GitHub release](https://img.shields.io/github/release/qubyte/rubidium.svg?maxAge=2592000)]()
[![GitHub license](https://img.shields.io/badge/license-Apache%202-blue.svg)](https://raw.githubusercontent.com/siokas/mrklog/master/LICENSE)


Mrklog (Markdown Blog) is as the name itself bespeaks, a simple blog that lets you create articles writing in markdown language. It is created using [Laravel PHP Framework](http://laravel.com) for the back-end and [Vue.js](http://vuejs.org/) for the front-end. Laravel creates the API and Vue.js displays the posts. The search feature is instant (that's why I do not include a button) as you write as well as the pagination pages (thanks to Vue.js)! This gives a nice and innovative feeling.

#### All Features
- Accountless way to create post
- Smart system detects if you post an article without having account and produce a 5 digit random string (pin) to let user edit/delete
- Markdown lang editor for editing posts
- Full authentication system with Facebook and Google+ support
- Tags support on posts
- Confirmation email feature (with code)


#### Libraries used till now (v 1.0-beta)
- _Laravel_ as back-end
- _Vuejs_ and _Vue resource_ as front-end (css: for adding tags to the post)
- _Disqus_ for the commenting system
- Laravel _Socialite_ for the Social login/signup system
- _Laravel-Tagging_ by _rtconner_ for the tagging system
- _Flash_ by _laracasts_ for the flash messages
- _Beautymail_ by _snowfire_ for nice looking email
- _l5-repository_ by _prettus_ for the repository system
- _Markdown_ by _graham-campbell_ to markdown the content on the laravel side
- _marked_ by _chjj_ to markdown the content on the javascript side
- _bootstrap-markdown_ by _toopay_ for the markdown editor
- jquery.js
- bootstrap.js
- pe-icon-7-stroke
- font awsome
- Molle font
- Theme by _Startbootstrap.com_ 
- Images by _Unsplash.com_

## About the blog

You can CRUD posts, add tags to them and also link every media you can think of (youtube, twitter, instagram, spotify etc). Everyone can create an account using Facebook, GooglePlus or just your personal email. Finally, I created a public API that can help developers to create apps about mrklog.

But the main question is: “What differs mrklog from other blog sites?” The answer is that mrklog lets users create articles **WITHOUT** having account! So everyone is welcome to write anything he/she wants even without logging in into the system! Tell me what’s quicker than that?

#### How to CRUD without account

There is a simple but clever way to update and/or delete posts you have created without account. At the moment you create an article, the success flash message gives you back a 5 string random generated pin code. In order to make changes to this article you have to provide this exact pin code. Of course if the user want to create an account there is no need to have pin code (just log in).

## License

The mrklog app is licensed under the [Apache License](http://opensource.org/licenses/Apache-2.0).