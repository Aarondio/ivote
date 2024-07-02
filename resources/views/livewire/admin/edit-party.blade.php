@section('title', 'Sign in to your account')

<div class="flex justify-center">

    <div class="lg:w-1/2 w-full mx-8">
        <a href="{{ route('parties') }}" class="border  border-black text-black py-1 px-3 rounded-sm hover:bg-black hover:text-white">Back</a>
        <div class="px-6 py-6 bg-white  sm:rounded-lg sm:px-10 mt-3">
            <h1 class="text-xl font-semibold mb-4 text-center">Edit Party Record</h1>
            <form wire:submit.prevent="updatePart">
               
                <div class="mb-4">
                    <label for="party" class="block text-sm font-medium text-gray-700 leading-5">
                        Party name
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="name" value="{{ $party->name }}" id="name" name="name" type="text"
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
                        <input wire:model.lazy="acronym" value="{{ $party->acronym }}" id="acronym" name="acronym" placeholder="E.g SMU"
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
                        <input wire:model.lazy="website" value="{{ $party->website }}" id="website" placeholder="E.g www.pdp.com" name="website"
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
                        <textarea wire:model.lazy="details" id="details" placeholder="Party history" name="details" required
                            autofocus
                            class="appearance-none block w-full border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror">{{ $party->details }}</textarea>
                    </div>

                    @error('details')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-green active:bg-green-green transition duration-150 ease-in-out">
                            Update Party
                        </button>
                    </span>
                </div>
            </form>
        </div>


    </div>

   

</div>
