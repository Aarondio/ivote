@section('title', 'Sign in to your account')

<div class="grid grid-cols-12 gap-4">

    <div class="col-span-12 ">
        <a href="{{ route('election') }}" class="border  border-black text-black py-1 px-3 rounded-sm hover:bg-black hover:text-white">Back</a>
        <h1 class="text-lg font-semibold mt-3">{{ $election->name . ' ' . $election->start_date->format('Y') }} Details</h1>

        <div class="flex">
            <div class="px-4 py-4 bg-green-100   sm:px-6 mt-2 flex justify-between">

                <p class="font-medium"><span class="font-bold text-green-600">Start Date:</p>
                <p>
                    {{ $election->start_date->format('Y-M-d') }}</p>


            </div>
            <div class="px-4 py-4 bg-red-100   sm:px-6 mt-2 flex justify-between">

                <p class="font-medium"><span class="font-bold text-red-600">End Date:</p>
                <p>{{ $election->end_date->format('Y-M-d') }}</p>

            </div>
        </div>
        <div class="mt-2 ">

            @if ($positions->isNotEmpty())
                <div class="bg-white px-6 py-4 rounded-md">
                    <h1 class="text-lg font-semibold ">{{ 'Available Positions' }} </h1>
                    <p class="text-sm text-gray-500 ">The following slot is available for the {{ $election->name }}</p>
                    <ul class="mt-3">
                        @php $sn = 1 @endphp
                        @foreach ($positions as $position)
                            <li class="capitalize">{{ $sn++ . '. ' . $position->name }}</li>
                        @endforeach
                        <ul>
                </div>
            @else
                <div class="bg-red-50 p-6 rounded-sm flex justify-center flex-col items-center">
                    <x-heroicon-o-exclamation-circle class="w-12 h-12 text-red-500" />
                    <h1 class="text-red-500 text-lg text-center">{!! 'No position has been created for the <span class="font-bold">' .
                        $election->name .
                        ' ' .
                        $election->start_date->format('Y') .
                        '</span>' !!}</h1>
                </div>
            @endif



            @if ($positions->count() < 2)
                <div class="flex justify-center mt-3">

                    <a href="{{ route('position', ['id' => $election->id]) }}"
                        class="text-sm bg-green-400 text-white rounded-sm px-2 py-1 self-center">Add Position</a>
                </div>
            @endif
        </div>


    </div>

    <div class="col-span-12 ">
        <div class="flex justify-between my-3">
            <h1 class="text-md md:text-lg font-semibold  self-center">{{ $election->name }} Candidates
                {{ $election->start_date->format('Y') }}
            </h1>
            <div class=" flex justify-center">
                <a href="{{ route('add', $election->id) }}"
                    class="text-sm bg-green-600 text-white rounded-sm px-2 py-1 self-center">Add Candidate</a>
            </div>
        </div>

        @if ($candidates->isEmpty())
            <div class="bg-red-50 p-6 rounded-sm flex justify-center flex-col items-center">
                <x-heroicon-o-exclamation-circle class="w-12 h-12 text-red-500" />
                <h1 class="text-red-500 text-lg text-center">{!! 'No candidate has been enroll for the <span class="font-bold">' .
                    $election->name .
                    ' ' .
                    $election->start_date->format('Y') .
                    '</span>' !!}</h1>
            </div>
            <div class="mt-4 flex justify-center">
                <a href="{{ route('add', $election->id) }}"
                    class="text-sm bg-green-600 text-white rounded-sm px-4 py-2 self-center">Add Candidate</a>
            </div>
        @else
            <div class="grid grid-cols-12 gap-2">
                @php $sn= 1; @endphp
                @foreach ($candidates as $candidate)
                    <div class="col-span-12 lg:col-span-3 md:col-span-6">

                        <div class="flex justify-center flex-col items-center py-4 px-4 bg-white shadow-sm rounded-sm">
                            <div class="self-center flex flex-col relative ">
                                <img src="{{ asset('storage/' . $candidate->image) }}" alt=""
                                    class="h-40 w-40 rounded-md">
                                <img src="{{ asset('storage/' . $candidate->party->logo) }}"
                                    alt="{{ $candidate->party->logo }}" class="h-10 w-10 absolute right-0">
                                <div class="py-2 text-xs font-bold">

                                    @if ($candidate->position->name == 'head')
                                        <div class="mt-4 ">
                                            {!! '<p class="leading-none "> ' . $candidate->name . ' (' . $candidate->party->acronym . ' President)</p>' !!}
                                        </div>
                                    @else
                                        <div class="mt-4 ">
                                            {!! '<p class="leading-none "> ' . $candidate->name . ' (' . $candidate->party->acronym . ' Vice)</p>' !!}
                                        </div>
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="bg-green-500 h-8 w-8 flex justify-center items-center rounded-full hover:bg-green-600">

                                <a href="{{ route('edit-candidate', $candidate->id) }}"
                                    > <x-heroicon-o-pencil class="h-4 w-4 text-white" /></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>

</div>
