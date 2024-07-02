<div>
    <div class="container mx-auto h-screen flex justify-center ">

        <div class="w-full p-4 rounded-sm ">
            <div class="flex justify-center self-center">
                <h1 class="text-3xl my-5 text-center font-bold">{{ $election->name }} Result
                    {{-- <span class="text-white rounded-md px-4 bg-red-500 ">Live</span> --}}
                </h1>
                <div class="text-white rounded-md px-4 bg-red-500 flex self-center ms-4">
                    <p>Live</p>
                    <div class="h-4 w-4 me-2 bg-red-400 animate-pulse self-center rounded-full ms-1"></div>
                </div>
            </div>
            <div class="grid grid-cols-12">
                @if ($votes->isEmpty())
                    <div class=" col-span-12 mt-4">
                        <div class="flex justify-center border-red-400 border rounded-lg p-12 bg-red-50">
                            <h1 class="text-lg">No result available at the moment</h1>
                        </div>
                    </div>
                @else
                    @if (now()->greaterThan($election->end_date))
                     
                        <div class="flex justify-center border-2 border-green-300 w-60 my-8 rounded-md bg-green-200">
                            <div class="px-4 py-4 sm:rounded-lg sm:px-6 mt-2 text-center">
                                <h1 class="text-center font-bold text-green-600 mb-2">Winner</h1>
                                <div class="flex justify-center relative">
                                    <img src="{{ asset('storage/' . $winner->image) }}" @class(['h-40 w-40 rounded-full border-2 border-white'])
                                        alt="">
                                    <img src="{{ asset('storage/' . $winner->party->logo) }}"
                                        class="h-10 w-10 rounded-full absolute right-8 bottom-[-6px]  border-2 border-white"
                                        alt="">
                                </div>
                                <div class="bg-white p-4 mt-4 rounded-md">
                                    <p class="leading-none font-semibold text-sm"> {!! $winner->name . ' (' . $winner->party->acronym . ')' !!} President</p>
                                </div>
                            </div>
                        </div>
                       
                    @else
                        @foreach ($votes as $vote)
                            <div class="lg:col-span-3 col-span-12">
                                <div class="flex justify-center bg-white rounded-t-lg">
                                    <img src="{{ asset('storage/' . $vote->candidate->image) }}" class=""
                                        alt="">
                                </div>
                                <div class="bg-white mt-2 flex justify-between p-4 rounded-b-lg">
                                    <h3>{{ $vote->candidate->name }}</h3>
                                    <span class="bg-green-500 text-white rounded-sm px-4">
                                        {{ number_format($vote->count()) }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif
            </div>
        </div>

    </div>

</div>
