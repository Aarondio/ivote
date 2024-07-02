<div class="grid grid-cols-12 gap-4">

    <div class="col-span-12 lg:col-span-6">
        <div class="px-4 py-12 bg-white rounded-md sm:px-8">
            <h1 class="text-xl font-semibold mb-4">Positions for
                {{ $election->name . ' ' . $election->start_date->format('Y') }}</h1>
            @if (session('error'))
                <div class="bg-red-100 text-red-600 p-4 rounded-md text-center mb-3">
                    {!! session('error') !!}
                </div>
            @endif
            <form wire:submit.prevent="store">


                <div class="mb-4">
                    <label for="election_type" class="block text-sm font-medium text-gray-700 leading-5">
                        Position
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <select wire:model.lazy="name" id="name" name="name"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror">
                            <option value="" disabled selected>Select Position Type</option>
                            <option value="head">Head</option>
                            <option value="vice">Vice</option>
                        </select>
                    </div>



                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-green active:bg-green-green transition duration-150 ease-in-out" >
                            Create
                        </button>
                    </span>
                </div>
            </form>
        </div>


    </div>

    <div class="col-span-12 lg:col-span-6 ">
        <div class="flex justify-between bg-white mb-3 p-4 rounded-md">
            <h1 class="text-xl font-semibold">Positions</h1>
            <a href="{{ route('election-details',$election->id) }}" class="px-4 py-1 text-sm font-medium text-green-600  border border-green-500 rounded-md hover:bg-green-500 hover:text-white focus:outline-none focus:border-green-700 focus:ring-green active:bg-green-green transition duration-150 ease-in-out">View Election</a>
        </div>

        @if ($positions->isEmpty())
            <div class="bg-red-50 p-6  flex justify-center flex-col items-center">
                <x-heroicon-o-exclamation-circle class="w-12 h-12 text-red-500" />
                <h1 class="text-red-500 text-lg text-center">{!! 'No position has been added for this election <span class="font-bold">' .
                    $election->name .
                    ' ' .
                    $election->start_date->format('Y') .
                    '</span>' !!}</h1>

            </div>
        @else
            @php $sn= 1; @endphp
            @foreach ($positions as $position)
                <div class="bg-white py-4 rounded-md px-4 mb-3 flex justify-between">

                    <div class="self-center flex">

                        <div class="self-center capitalize">
                            {!! $position->name !!}
                        </div>

                    </div>
                    <div class="flex">
                        <a href="#" class="p-2 rounded-sm bg-green-400"><x-heroicon-o-pencil-square
                                class="text-white h-5 w-5" /></a>
                        <a href="#" class="p-2 rounded-sm bg-red-400 ms-2"><x-heroicon-o-trash
                                class="text-white h-5 w-5" /></a>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

</div>
