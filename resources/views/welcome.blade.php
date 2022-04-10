@extends('layouts.app')
@section('content')
<div class="flex justify-between items-center pt-10 px-8 w-full">
    <div class="">
        <div class="block text-5xl font-bold text-gray-900">
            Welcome to IRC!
        </div>
        <div class="block text-3xl font-semibold text-gray-700">
            A place for every Indian Racing Enthusiast.
        </div>
        @guest
        <div class="flex">
            <div class="mt-16 text-2xl font-semibold px-4 py-2 bg-purple-600 shadow-lg text-white rounded-md cursor">
                <a href="{{route('joinus')}}">Join us</a>
            </div>
        </div>
        @endguest
        <div class="mt-10">
            <div class="text-xl font-semibold text-gray-600">
                Follow Us
            </div>
            <div class="flex">
                <div class="text-4xl text-red-600">
                    <a href="https://www.youtube.com/channel/UC2Li3g3zak9gQ6YtE3YThXw" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <div class="text-4xl text-blue-600 ml-4">
                    <a href="https://twitter.com/racing_indian" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
                <div class="text-4xl text-pink-800 ml-4">
                    <a href="https://www.instagram.com/indianracingcommunity/" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <div class="text-4xl text-blue-800 ml-4">
                    <a href="https://steamcommunity.com/groups/indianracingcommunity" target="_blank">
                        <i class="fab fa-steam"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div>
        
    </div>

    <div class="popover__wrapper m-4 ">
        <a href="#">
            <img class="object-contain rounded-full hidden md:block" width="70" src='{{asset('/img/homeDiscord.png')}}'>
        </a>
        <div class="popover__content">
            <iframe src="https://discord.com/widget?id={{$irc_guild}}&theme=dark" class="mt-5" width="300" height="500" allowtransparency="true"></iframe>
        </div>
    </div>

    <div class="w-1/2 hidden md:block">
		<img class="object-contain" src='https://cdn.dribbble.com/users/1568450/screenshots/7880617/media/2b89eb9a9496fba5dc1f7bf7d1418855.png'>
	</div>
</div>
<div style="height:250px; width:100%; clear:both;"></div>

{{-- <script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async defer>
    new Crate({
      server: '641545840619683841',
      channel: '645515279593373717'
    })
  </script> --}}
@endsection
