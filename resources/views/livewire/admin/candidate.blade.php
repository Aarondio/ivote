<div class="container mx-auto">

    <div class="flex justify-center">
        <div class="lg:w-2/3 bg-white p-8 rounded-md">
            <h1 class="text-xl font-semibold mb-4">Add Candidates for upcoming elections</h1>

            @if ($elections->isEmpty())
                <div class="bg-red-50 p-6 rounded-sm flex justify-center flex-col items-center">
                    <x-heroicon-o-exclamation-circle class="w-12 h-12 text-red-500" />
                    <h1 class="text-red-500 text-lg text-center">{{ 'No party has been registered on the system' }}</h1>
                </div>
            @else
                @php $sn= 1; @endphp
                @foreach ($elections as $election)
                    <div class="bg-neutral-50 py-4 md:rounded-lg sm:px-4 mb-3 flex justify-between">

                        <div class="self-center flex">

                            <div class="self-center">
                                {!! $election->name . ' <span class="font-bold text-xs">(' . $election->start_date->format('Y') . ')<span>' !!}
                            </div>

                            @if ($election->start_date->format('Y-m-d') > now()->format('Y-m-d'))
                                &nbsp; <span
                                    class="text-xs self-center font-bold text-green-600 bg-green-200 px-2 rounded-full">
                                    Starting on
                                    {{ $election->start_date->format('M-d') }}</span>
                            @else
                                &nbsp; <span
                                    class="text-xs self-center font-bold text-green-600 bg-green-200 px-2 rounded-full">{{ 'Ongoing' }}</span>
                            @endif
                        </div>
                        <div class="flex">

                            @if ($election->start_date->format('Y-m-d') > now()->format('Y-m-d'))
                                <a href="{{ route('add',$election->id) }}" class="p-2 rounded-sm bg-green-400 flex text-white font-medium"><x-heroicon-o-user-plus
                                        class="text-white h-5 w-5 self-center" />Add Candidate</a>
                            @else
                            <button href="#" class="p-2 rounded-sm bg-neutral-300 flex text-gray-400 " disabled="true"><x-heroicon-o-user-plus
                                class="text-gray-400  h-5 w-5" />Add Candidate</button>
                            @endif

                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>
