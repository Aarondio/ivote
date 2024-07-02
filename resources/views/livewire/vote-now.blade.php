<div class="container mx-auto py-8" x-data="{ show: false }">
    @if (empty($vote))
        
        <div class="py-8 bg-neutral-50 mx-4 px-4">
            <div class="text-center">
                <h3 class="text-lg font-medium mb-2">Hello 👋 {{ Auth::user()->name ?? 'Anonymous' }}</h3>
                <p class="text-slate-500 mb-2">Kindly vote for your favorite candidate by clicking on the box below their
                    details and click the vote button to submit your entry</p>
                <h1 class="md:text-3xl text-3xl font-bold md:leading-[3.2rem]">
                    {{ $election->name . ' ' . $election->start_date->format('Y') }}</h1>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-4 mt-6 text-center mx-4">
            @if ($candidates->isNotEmpty() && $candidates->count() > 1)
                @foreach ($candidates as $candidate)
                    <div class="col-span-12 md:col-span-6 lg:col-span-3 border-2">
                        <div class="px-4 py-4 sm:rounded-lg sm:px-6 mt-2">
                            <div class="flex justify-center relative">
                                <img src="{{ asset('storage/' . $candidate->image) }}" @class(['h-40 w-40 rounded-full border-2 border-white'])
                                    alt="">
                                <img src="{{ asset('storage/' . $candidate->party->logo) }}"
                                    class="h-10 w-10 rounded-full absolute right-14 bottom-0 border-2 border-white"
                                    alt="">
                            </div>
                            <div class="bg-white p-4 mt-4">
                                <p class="leading-none font-semibold text-sm"> {!! $candidate->name . ' (' . $candidate->party->acronym . ')' !!} President</p>
                            </div>
                        </div>
                        <div class="pb-4">
                            <input type="radio" x-on:click="show= true" wire:model="candidate_id"
                                value="{{ $candidate->id }}" name="candidate_id" @class(['h-6 w-6 rounded border-2 border-green-500 '])>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-12">
                    <div class="px-4 py-8 bg-red-100 rounded-lg sm:px-6 mt-2 mx-4">
                        <div class="flex flex-col items-center">
                            <x-heroicon-o-exclamation-circle class="h-12 w-12 text-red-600 mb-4" />
                            <h1 class="text-lg text-center font-medium text-red-600">
                                {{ 'Candidates information is still under review by ivote committee' }} </h1>
                        </div>
                    </div>
                    <div class="flex justify-center mt-5 w-full">
                        <button onclick="history.back()" class="border-2 border-slate-300 px-6 py-2 rounded-md font-medium text-slate-500 cursor-pointer hover:border-slate-800 hover:text-slate-800 ">Back</button>
                       </div>
                </div>
           
            @endif
        </div>
        <div class="flex justify-center mt-6" x-show="show">
            <button wire:confirm="Are you sure you want vote the selected candidate?"
                class="text-white font-semibold rounded-lg text-center bg-green-500 px-24 py-3 disabled:bg-slate-300"
                wire:click="vote">
                Vote
            </button>
        </div>
    @else
        <div class="flex justify-center mx-4">
           
             <div class="lg:w-1/2 bg-white text-center py-10 px-6 flex justify-center flex-col items-center rounded-lg">
               
                <h3 class="text-lg font-medium mb-2">Hello 👋 {{ Auth::user()->name ?? 'Anonymous' }}</h3>
                <p class="text-slate-500">You have already casted your vote for  {{ $election->name . ' ' . $election->start_date->format('Y') }}. </p>
                <h1 class="mt-4">Vote Information</h1>

            
                <div class=" border-2 border-green-300 w-60 my-8 rounded-md bg-green-200">
                    <div class="px-4 py-4 sm:rounded-lg sm:px-6 mt-2">
                        <div class="flex justify-center relative">
                            <img src="{{ asset('storage/' . $vote->candidate->image) }}" @class(['h-40 w-40 rounded-full border-2 border-white'])
                                alt="">
                            <img src="{{ asset('storage/' . $vote->candidate->party->logo) }}"
                                class="h-10 w-10 rounded-full absolute right-8 bottom-[-6px]  border-2 border-white"
                                alt="">
                        </div>
                        <div class="bg-white p-4 mt-4 rounded-md">
                            <p class="leading-none font-semibold text-sm"> {!! $vote->candidate->name . ' (' . $vote->candidate->party->acronym . ')' !!} President</p>
                        </div>
                    </div>
                </div>
                <button onclick="history.back()" class="border-2 border-slate-300 px-6 py-2 rounded-md font-medium text-slate-500 cursor-pointer hover:border-slate-800 hover:text-slate-800 ">Back</button>
             </div>
            
        </div>
    @endif
</div>
