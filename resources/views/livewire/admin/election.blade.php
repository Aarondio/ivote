@section('title', 'Sign in to your account')

<div class="grid grid-cols-12 gap-4">

    <div class="col-span-12 lg:col-span-4">
        <div class="px-4 py-4 bg-white  sm:rounded-lg sm:px-10">
            <h1 class="text-xl font-semibold mb-4">Create Election Campaign</h1>
            <form wire:submit.prevent="store">
                <div class="mb-4">
                    <label for="party" class="block text-sm font-medium text-gray-700 leading-5">
                        Election name
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.live="name" id="name" name="name" type="text"
                            placeholder="E.g Election name" autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="election_type" class="block text-sm font-medium text-gray-700 leading-5">
                        Election type
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <select wire:model.lazy="election_type" id="election_type" name="election_type"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"
                            wire:click="$dispatch('resetState')">
                            <option value="" selected disabled>--Set election type--</option>
                            <option value="national">General Election</option>
                            <option value="state">Faculty Election</option>
                            <option value="local">Department Election</option>
                        </select>
                    </div>


                    @error('election_type')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                @if ($election_type != 'national')
                    <div class="mb-4 rounded-md shadow-sm">
                        <label for="state">Faculty</label>
                        <select wire:model.live="faculty_id" id="state" name="state"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none sm:text-sm sm:leading-5">
                            <option value="" selected disabled>--Select faculty--</option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}" wire:key="{{ $state->id }}">{{ $state->name }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                @endif
                @if (!empty($faculty_id))
                    <div class="mb-4 rounded-md shadow-sm">
                        <label for="lga">Department</label>
                        <select wire:model.lazy="department_id" id="lga" name="lga"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none sm:text-sm sm:leading-5">
                            <option value="" selected disabled wire:key="999">--Select an Department--</option>
                            <option value="0" wire:key="1000">All Department</option>
                            @foreach ($lgas as $lga)
                                <option value="{{ $lga->id }}" wire:key={{ $lga->id }}>{{ $lga->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="mb-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-700 leading-5">
                        Start Date
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="start_date" id="start_date" name="start_date" type="date"
                            min="{{ date('Y-m-d') }}"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('start_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="end_date" class="block text-sm font-medium text-gray-700 leading-5">
                        End Date
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="end_date" id="end_date" name="end_date" type="date"
                            min="{{ date('Y-m-d') }}" autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('end_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>




                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-green active:bg-green-green transition duration-150 ease-in-out">
                            Create
                        </button>
                    </span>
                </div>
            </form>
        </div>


    </div>

    <div class="col-span-12 lg:col-span-8 bg-white p-8 rounded-md">
        <h1 class="text-xl font-semibold mb-4">Upcoming Elections</h1>

        @if ($elections->isEmpty())
            <div class="bg-red-50 p-6 rounded-sm flex justify-center flex-col items-center">
                <x-heroicon-o-exclamation-circle class="w-12 h-12 text-red-500" />
                <h1 class="text-red-500 text-lg text-center">{{ 'No upcoming elections at the moment' }}</h1>
            </div>
        @else
            @php $sn= 1; @endphp
            @foreach ($elections as $election)
                <div class="bg-neutral-50 py-4 md:rounded-lg sm:px-4 mb-3">

                    <div class="flex justify-between ">
                        <div class="self-center flex flex-col ">

                            <div class="self-center ">
                                {!! '<p class="leading-none"> ' .
                                    $election->name .
                                    ' <span class="font-bold leading-none text-xs ">(' .
                                    $election->start_date->format('Y') .
                                    ')<span></p>' !!}
                            </div>
                            @if ($election->start_date->format('Y-m-d') > now()->format('Y-m-d'))
                                <span
                                    class="text-xs self-start mt-2 font-bold text-green-600 bg-green-200 px-2 rounded-full">
                                    Starting on
                                    {{ $election->start_date->format('M-d') }}</span>
                            @else
                                <span
                                    class="text-xs self-start mt-2 font-bold text-green-600 bg-green-200 px-2 rounded-full">{{ 'Ongoing' }}</span>
                            @endif

                        </div>
                        <div class="flex self-center">
                            <a href="{{ route('election-details', ['id' => $election->id]) }}"
                                class="p-2 rounded-sm bg-purple-400 me-2" title="Add Candidate"><x-heroicon-o-eye
                                    class="text-white h-5 w-5" /></a>

                            <a href="{{ route('edit-election',$election->id) }}" class="p-2 rounded-sm bg-green-400 mx-2"
                                title="Edit election details"><x-heroicon-o-pencil-square
                                    class="text-white h-5 w-5" /></a>
                            <a href="#" wire:confirm="Are you sure you want to delet"
                                wire:click="destroy({{ $election->id }})"
                                class="p-2 rounded-sm bg-red-400 ms-2"><x-heroicon-o-trash
                                    class="text-white h-5 w-5" /></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

</div>
