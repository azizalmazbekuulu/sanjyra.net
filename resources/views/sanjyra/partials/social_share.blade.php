<dl class="text-center border border-green-600 p-4 rounded-md">
<dt><small>Социалдык тармактарда бөлүшүү</small></dt>
<dd class="sharing justify-center flex">
<a title="Facebookта бөлүшүү" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" rel="noopener" target="_blank"><img src="{{asset('storage/logos/Facebook.png')}}" width="32" height="32" alt="Facebook"></a>
<a title="Twitterде бөлүшүү" onclick="social_share('https://twitter.com/intent/tweet?url={{url()->current()}}&text=')"><img src="{{asset('storage/logos/Twitter.svg')}}" width="32" height="32" alt="Twitter"></a>
<a title="Telegramда бөлүшүү" onclick="social_share('https://telegram.me/share/url?url={{url()->current()}}&text=')"><img src="{{asset('storage/logos/Telegram.png')}}" width="32" height="32" alt="Telegram"></a>
<a title="Одноклассникиде бөлүшүү" onclick="social_share('https://connect.ok.ru/offer?url={{url()->current()}}&title=')"><img src="{{asset('storage/logos/OK.png')}}" width="32" height="32" alt="Odnoklassniki"></a>
<a title="What's Appта бөлүшүү" onclick="social_share('whatsapp://send?text={{url()->current()}} - ')" data-action="share/whatsapp/share"><img style="border-radius:7px;" src="{{asset('storage/logos/WhatsApp.png')}}" width="32" height="32" alt="WhatsApp"></a>
<a title="Вконтактеде бөлүшүү" onclick="social_share('https://vk.com/share.php?url={{url()->current()}}')"><img src="{{asset('storage/logos/VK.png')}}" width="32" height="32" alt="Vkontakte"></a>
</dd></dl>