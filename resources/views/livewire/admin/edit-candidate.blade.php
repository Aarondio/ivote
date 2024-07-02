<div class="container mx-auto mb-12">



    <div class="w-full lg:w-1/2 mx-auto">
        <div class="px-4 py-12 bg-white  sm:rounded-lg sm:px-10 ">

            <h1 class="text-xl font-semibold mb-4 ">Edit candidate for
                {{ $election->name . ' ' . $election->start_date->format('Y') }}</h1>

            @if (session('error'))
                <div class="bg-red-50 text-red-500 text-center rounded-md my-3 p-5">
                    {{ session('error') }}
                </div>
            @endif


            <form wire:submit.prevent="update">
                <div class="mb-4">
                    @if (empty($image))
                        <div class="flex justify-center">
                            {{-- <img src="{{ $image->temporaryUrl() ?? asset('assets/images/noimage.png') }}"
                                    class="h-[160px] w-[160px] rounded-lg"> --}}
                            <img src="{{ asset('assets/images/noimage.png') }}" class="h-[160px] w-[160px] rounded-lg">
                        </div>
                    {{-- @elseif($image)
                        <div class="flex justify-center">
                            <img src="{{ $image->temporaryUrl() ?? asset('assets/images/noimage.png') }}"
                                class="h-[160px] w-[160px] rounded-lg">

                        </div> --}}
                    @else
                        <div class="flex justify-center">
                            <img src="{{ asset('storage/' . $candidate->image) }}" class="h-[160px] w-[160px] rounded-lg">
                        </div>
                    @endif
                    <label for="party" class="block text-sm font-medium text-gray-700 leading-5">
                        Candidate Picture
                    </label>

                    <div class="mt-1 rounded-md ">
                        <input wire:model="image" id="image" name="image" type="file" accept="image/*" 
                            class="
                                block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-lg file:border-0
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
                        Candidate Name
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model="name" id="name" name="name" type="text"
                            placeholder="E.g Abache Sani" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="party_id" class="block text-sm font-medium text-gray-700 leading-5">
                        Candidate Party
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <select wire:model.lazy="party_id" id=party_id" name="party_id" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('party_id') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror">
                            <option value="" class="text-gray-200" selected disabled>Candidate party</option>
                            @foreach ($parties as $party)
                                <option value="{{ $party->id }}" @if($party->id ==$candidate->party_id)selected @endif>{{ $party->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('party_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="Position" class="block text-sm font-medium text-gray-700 leading-5">
                        Position
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <select wire:model.lazy="position_id" id="position_id" name="position_id" required
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('position_id') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror">
                            <option value="" class="text-gray-200" selected disabled>Select Position</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}" class="capitalize">{{ $position->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @error('position_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="party" class="block text-sm font-medium text-gray-700 leading-5">
                        Notable Achievement
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">

                        <textarea wire:model.lazy="notable_achievement" id="notable_achievement" placeholder="Notable Achievement"
                            name="notable_achievement" type="text" required autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" /></textarea>
                    </div>

                    @error('website')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <input type="text" value="{{ $election->id }}" wire:model="election_id" hidden>
                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-green active:bg-green-green transition duration-150 ease-in-out">
                            Update Candidate
                        </button>
                    </span>
                </div>
            </form>

        </div>


    </div>


</div>
