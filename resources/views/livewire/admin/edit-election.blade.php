@section('title', 'Sign in to your account')

<div class="flex justify-center">

    <div class="lg:w-1/2 w-full mx-4">
        <a href="{{ route('election') }}" class="border  border-black text-black py-1 px-3 rounded-sm hover:bg-black hover:text-white">Back</a>
        <div class="px-4 py-4 mt-3 bg-white  sm:rounded-lg sm:px-10">
            <h1 class="text-xl font-semibold mb-4">Edit Election</h1>
            <form wire:submit.prevent="store">
                <div class="mb-4">
                    <label for="party" class="block text-sm font-medium text-gray-700 leading-5">
                        Election name
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.live="name" value="{{ $election->name }}" id="name" name="name" type="text"
                            placeholder="E.g Election name" autofocus
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
               
             
              
                <div class="mb-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-700 leading-5">
                       <span class="text-sm text-red-500">(Old start Date {{ $election->start_date->format('Y M d') }})</span>
                    </label>

                    {{-- <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="start_date" value="{{ $election->start_date }}" id="start_date" name="start_date" type="date"
                            min="{{ date('Y-m-d') }}"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div> --}}

                    @error('start_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="end_date" class="block text-sm font-medium text-gray-700 leading-5">
                      <span class="text-sm text-red-500">(Old End Date {{ $election->end_date->format('Y M d') }})</span>
                    </label>
{{-- 
                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="end_date" value="{{ $election->end_date }}" id="end_date" name="end_date" type="date"
                            min="{{ date('Y-m-d') }}"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 outline-0 focus:outline-none focus:ring-green-400 focus:border-none  sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div> --}}

                    @error('end_date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>




                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit"
                            class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-green active:bg-green-green transition duration-150 ease-in-out">
                            Update Election
                        </button>
                    </span>
                </div>
            </form>
        </div>


    </div>

   

</div>
