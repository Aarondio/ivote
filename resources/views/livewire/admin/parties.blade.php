@section('title', 'Sign in to your account')

<div class="grid grid-cols-12 gap-4">

    <div class="col-span-12 lg:col-span-4">
        <div class="px-4 py-4 bg-white  sm:rounded-lg sm:px-10">
            <h1 class="text-xl font-semibold mb-4 text-center">Register a party</h1>
            <form wire:submit.prevent="store">
                <div class="mb-4">
                    @if ($logo)
                        <div class="flex justify-center">
                            <img src="{{ $logo->temporaryUrl() }}" class="h-20 w-20 rounded-lg">
                        </div>
                    @else 
                    <div class="flex justify-center">
                        <img src="{{ asset('assets/images/noimage.png') }}" class="h-20 w-20 rounded-lg">
                    </div>
                    @endif
                    <label for="party" class="block text-sm font-medium text-gray-700 leading-5">
                        Party Logo
                    </label>

                    <div class="mt-1 rounded-md ">
                        <input wire:model.lazy="logo" id="logo" name="logo" type="file" required
                            class="
                            block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-green-50 file:text-green-700
                            hover:file:bg-green-100
                           
                            " />
                    </div>

                    @error('logo')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="party" class="block text-sm font-medium text-gray-700 leading-5">
                        Party name
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="name" id="name" name="name" type="text"
                            placeholder="E.g Student movement union" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="party" class="block text-sm font-medium text-gray-700 leading-5">
                        Acronym
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="acronym" id="acronym" name="acronym" placeholder="E.g SMU"
                            type="text" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('acronym')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="party" class="block text-sm font-medium text-gray-700 leading-5">
                        Party website
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="website" id="website" placeholder="E.g www.pdp.com" name="website"
                            type="text" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('website')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="party" class="block text-sm font-medium text-gray-700 leading-5">
                        Party Details
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">

                        <textarea wire:model.lazy="details" id="details" placeholder="Party history" name="details" type="text" required
                            autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" /></textarea>
                    </div>

                    @error('details')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-green active:bg-green-green transition duration-150 ease-in-out">
                            Create Party
                        </button>
                    </span>
                </div>
            </form>
        </div>


    </div>

    <div class="col-span-12 lg:col-span-8 bg-white p-8 rounded-md">
        <h1 class="text-xl font-semibold mb-4">Registered Parties</h1>

        @if ($parties->isEmpty())
            <div class="bg-red-50 p-6 rounded-sm flex justify-center flex-col items-center">
                <x-heroicon-o-exclamation-circle class="w-12 h-12 text-red-500" />
                <h1 class="text-red-500 text-lg text-center">{{ 'No party has been registered on the system' }}</h1>
            </div>
        @else
            @php $sn= 1; @endphp
            @foreach ($parties as $party)
                <div class="bg-neutral-50 px-4  py-4 md:rounded-lg  mb-3 flex justify-between">

                    <div class="self-center flex">
                        <span class="font-bold self-center">{{ $sn++ . '.' }}</span>
                        @if (!empty($party->logo))
                            <img src="{{ 'storage/'.$party->logo }}" class="h-10 w-10 mx-2 rounded-full"
                                alt="{{ $party->name }}">
                        @else
                            <img src="{{ 'assets/images/noimage.png' }}" class="h-10 w-10 mx-2 rounded-full"
                                alt="{{ $party->name }}">
                        @endif
                        <div class="self-center">
                            {!! $party->name . ' <span class="font-bold text-xs">(' . $party->acronym . ')<span>' !!}
                        </div>
                    </div>
                    <div class="flex">
                        <a href="{{ route('edit-party',$party->id) }}" class="p-2 rounded-sm bg-green-400"><x-heroicon-o-pencil-square
                                class="text-white h-5 w-5" /></a>
                        <a href="#" wire:confirm="Are you sure you want to delet" wire:click="destroy({{ $party->id }})" class="p-2 rounded-sm bg-red-400 ms-2"><x-heroicon-o-trash
                                class="text-white h-5 w-5" /></a>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

</div>
