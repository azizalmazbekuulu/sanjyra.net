@extends('sanjyra.layouts.app')
@section('title', 'Санжыра мобилдик тиркемеси')
@section('content')
<div class="max-w-screen-md w-full mx-auto text-justify">
<h1 class="text-center font-bold text-2xl mb-3 underline">Санжыра тиркемеси</h1>
<p class="italic">Акыркы өзгөртүү: 5-март 2021-жыл</p>
<p>Тиркемени төмөнкү шилтеме аркылуу көчүрүп алыңыз:</p>
    <button id="butInstall" class="text-white bg-blue-600 hover:bg-blue-300 hover:text-gray-900 p-1 px-6 border border-red-400 rounded-md max-w-max">Тиркемени орнотуп ал!</button>
<p>*Эгер жогорудагы баскыч басылбай жатса сиздин түзүлүшүңүзгө тиркеме орнотулган</p>
<br><h3><strong>Тиркемени колдонуу эрежелери</strong></h3>
<p><a class="underline text-blue-700" href="https://sanjyra.net">Sanjyra.net</a> сайтынын мобилдик тиркемесин тиркемесин колдонуу менен сиз төмөнкү эрежелерге макулдугуңузду бересиз.</p>
<ul class="ml-12" style="list-style-type:disc">
    <li><a class="underline text-blue-700" href="https://sanjyra.net">Sanjyra.net</a> сайтынын <a class="underline text-blue-700 hover:no-underline hover:text-gray-700" href="{{route('terms-of-use')}}">эрежелерине</a></li>
    <li>Тиркемеге эч кандай өзгөртүүлөрдү киргизүүгө болбойт.</li>
    <li>Тиркемени коммерциялык максатта колдонууга болбйт.</li>
</ul>
<h3 class="m-4 font-semibold text-lg"><strong>Эрежелерди өзгөртүү</strong></h3>
<p>Бул эрежелерге ар убакыт өзгөртүүлөр киргизилүүсү мүмкүн. Эрежелер жарыяланган күндөн тартып күчүнө кирет.</p>
<h3 class="m-4 font-semibold text-lg"><strong>Байланыш</strong></h3>
<p>Эрежелер боюнча суроолоруңуздар болсо биз менен байланышыңыздар:
<ul>
	<li>Email: <a class="underline text-blue-700 hover:text-blue-500 hover:no-underline" href="mailto:info@sanjyra.net">info@sanjyra.net</a></li>
</ul>
</p>
</div>
@endsection