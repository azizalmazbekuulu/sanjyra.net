<dl class="text-center">
    <dt><small>Социалдык тармактарда бөлүшүү</small></dt>
    <dd class="sharing justify-content-center">
        <a title="Facebookта бөлүшүү" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="fab fa-facebook-square facebook"></i></a>
        <a title="Twitterде бөлүшүү" onclick="social_share('https://twitter.com/intent/tweet?url={{url()->current()}}&text=')"><i class="fab fa-twitter-square twitter"></i></a>
        <a title="What's Appта бөлүшүү" onclick="social_share('whatsapp://send?text={{url()->current()}} - ')" data-action="share/whatsapp/share"><i class="fab fa-whatsapp-square whatsapp"></i></a>
        <a title="Telegramда бөлүшүү" onclick="social_share('https://telegram.me/share/url?url={{url()->current()}}&text=')"><i class="fab fa-telegram telegram"></i></a>
        <a title="Одноклассникиде бөлүшүү" onclick="social_share('https://connect.ok.ru/offer?url={{url()->current()}}&title=')"><i class="fab fa-odnoklassniki-square odnoklassniki"></i></a>
        <a title="Вконтактеде бөлүшүү" onclick="social_share('https://vk.com/share.php?url={{url()->current()}}')"><i class="fab fa-vk vkontakte"></i></a>
    </dd>
</dl>