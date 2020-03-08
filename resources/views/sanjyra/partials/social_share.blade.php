<div class="justify-content-center sharing">
    <a title="Facebookта бөлүшүү" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="fab fa-facebook-square fa-2x facebook"></i></a>
    <a title="Twitterде бөлүшүү" onclick="social_share('https://twitter.com/intent/tweet?url={{url()->current()}}&text=')"><i class="fab fa-twitter-square fa-2x twitter"></i></a>
    <a title="What's Appта бөлүшүү" onclick="social_share('whatsapp://send?text={{url()->current()}} - ')" data-action="share/whatsapp/share"><i class="fab fa-whatsapp-square fa-2x whatsapp"></i></a>
    <a title="Telegramда бөлүшүү" onclick="social_share('https://telegram.me/share/url?url={{url()->current()}}&text=')" target="_blank"><i class="fab fa-telegram fa-2x telegram"></i></i></a>
</div>