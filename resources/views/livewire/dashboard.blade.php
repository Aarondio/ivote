<div class="">
    {{-- <div class="py-12" style="background-image: url({{ asset('assets/images/electionbg.jpg') }})"> --}}
    <section class="py-20 bg-neutral-50">
        <div class="h-42 py-2 z-0 text-center">
            <h3 class="text-lg font-medium mb-2">Hello 👋 {{ Auth::user()->name ?? 'Anonymous' }}</h3>
            <p class="text-slate-500 mb-2">Welcome to ivote</p>
            <h1 class="md:text-5xl text-3xl font-bold md:leading-[3.2rem]">Voter's Dashboard</h1>
            <div class="text-green-500  font-semibold   flex justify-center my-4">
                <div class="w-[13rem] bg-white shadow-sm flex justify-center px-2 py-2 rounded-full ">
                    <div class="h-4 w-4 me-2 bg-green-500 animate-pulse self-center rounded-full"></div>
                    <a href="{{ route('results-record') }}">
                        Visit result center
                    </a>
                </div>
            </div>
            {{-- <h1 class="md:text-5xl text-3xl font-bold mb-10 md:leading-[3.2rem]">A System that Provides<br/> electorial ease</h1> --}}
            {{-- <p class="text-slate-500 mb-6">Providing you with electorial ease</p> --}}
           <div class="flex justify-center">
            <a href="#vote" class=" border border-slate-500 px-3 py-3 rounded-full text-black text-center transition-all hover:bg-green-300"><x-heroicon-o-arrow-down class="h-5 w-5 text-center"/></a>
           </div>
        </div>
    </section>

    <section class="my-6  container mx-auto px-4 py-12" id="vote">
        <div class=" grid grid-cols-12 gap-4">
            <div class="col-span-12 lg:col-span-4 ">
                <h1 class="text-xl font-medium">School Elections</h1>
                @if ($nationals->isNotEmpty())
                    @foreach ($nationals as $national)
                        <div class="bg-green-50 p-4  rounded-lg mt-3 border-2 border-green-200 flex justify-between">
                            <h1 class="font-semibold text-green-900 self-center">{{ $national->name }}</h1>
                            <a href="{{ route('vote',$national->id) }}" class="bg-green-500 px-6 py-2 rounded-md  text-white">Vote</a>
                        </div>
                    @endforeach
                @else
                    <div class="bg-red-50 p-4  rounded-lg mt-3 border-2 border-red-200 flex justify-between">
                        <h1 class="font-semibold text-red-900 self-center">No election available at the moment</h1>
                        <button class="bg-red-500 px-6 py-2 rounded-md  text-white disabled:bg-red-300"
                            disabled>Vote</button>
                    </div>
                @endif
            </div>
            <div class="col-span-12 lg:col-span-4 ">
                <h1 class="text-xl font-medium">Faculty Election</h1>
                @if ($states->isNotEmpty())
                    @foreach ($states as $state)
                        <div class="bg-green-50 p-4  rounded-lg mt-3 border-2 border-green-200 flex justify-between">
                            <h1 class="font-semibold text-green-900 self-center">{{ $state->name }}</h1>
                            <a href="{{ route('vote',$state->id) }}" class="bg-green-500 px-6 py-2 rounded-md  text-white">Vote</a>
                        </div>
                    @endforeach
                @else
                    <div class="bg-red-50 p-4  rounded-lg mt-3 border-2 border-red-200 flex justify-between">
                        <h1 class="font-semibold text-red-900 self-center">No election available at the moment</h1>
                        <button  class="bg-red-500 px-6 py-2 rounded-md  text-white disabled:bg-red-300"
                            disabled>Vote</button>
                    </div>
                @endif
            </div>
            <div class="col-span-12 lg:col-span-4 ">
                <h1 class="text-xl font-medium">Departmental Election</h1>
                @if ($locals->isNotEmpty())
                    @foreach ($locals as $local)
                        <div class="bg-green-50 p-4  rounded-lg mt-3 border-2 border-green-200 flex justify-between">
                            <h1 class="font-semibold text-green-900 self-center">{{ $local->name }}</h1>
                            <a href="{{ route('vote',$local->id) }}" class="bg-green-500 px-6 py-2 rounded-md  text-white">Vote</a>
                        </div>
                    @endforeach
                @else
                    <div class="bg-red-50 p-4  rounded-lg mt-3 border-2 border-red-200 flex justify-between">
                        <h1 class="font-semibold text-red-900 self-center">No election available at the moment</h1>
                        <button  class="bg-red-500 px-6 py-2 rounded-md  text-white disabled:bg-red-300"
                            disabled>Vote</button>
                    </div>
                @endif
            </div>
        </div>
    </section>


    <div class="bg-slate-900 p-12 text-center text-white">
        <h1>IVOTE {{ now()->format('Y') }}</h1>
    </div>
</div>
