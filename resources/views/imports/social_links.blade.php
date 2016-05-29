<script>
(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=953726907994585";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<div style="display: inline-block;" class="fb-share-button" data-href="http://mrklog.com/posts/{{ $post->id }}" data-layout="button" data-mobile-iframe="true"></div>
<div style="display: inline-block;">
<a style="display: inline-block;" href="https://twitter.com/share" class="twitter-share-button" data-hashtags="mrklog">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</div>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<div style="display: inline-block;" class="g-plus" data-action="share" data-annotation="none"></div>
