<div class="w-full bg-gray-300 flex items-center my-3">
    <div class="w-1/4 m-2 bg-white h-16"></div>
    <div class="w-3/4">
        <div class="flex flex-col">
            <span class="text-black"><a href="/tv/{{ $tv['id'] }}">{{ $tv['name'] }}</a></span>
            <span class="text-black ">{{ $tv['overview'] }}</span>
        </div>
        <div class="mx-auto w-full flex justify-between">
            <span class="text-black">score:{{ $tv['vote_average'] }}</span>
            <span class="text-black">Reviews</span>
        </div>
    </div>
</div>
