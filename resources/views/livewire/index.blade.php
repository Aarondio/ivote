<div class="">
    {{-- <div class="py-12" style="background-image: url({{ asset('assets/images/electionbg.jpg') }})"> --}}
    <div class="py-12 bg-green-50">
        <div class="h-42 py-12 z-0 text-center">
            <div class="text-green-500  font-semibold   flex justify-center">
                <div class="w-[13rem] bg-white shadow-sm flex justify-center px-2 py-2 rounded-full ">
                    <div class="h-4 w-4 me-2 bg-green-500 animate-pulse self-center rounded-full"></div>
                    <a href="{{ route('results-record') }}">
                        Visit result center
                    </a>
                </div>
            </div>

            <h1 class=" text-5xl font-bold mt-4">Online Voting System For</h1>
            <h1 class=" text-5xl font-bold my-2">General Elections</h1>
            <p class="mb-6 text-slate-500">Providing easier access to voting.</p>
            <a href="{{ route('my-elections') }}" class="bg-green-500 px-6 py-2 rounded-md mt-6 text-white">Vote now</a>
        </div>
    </div>

    <div class=" w-full  p-8">
        <h1 class="text-2xl mb-4 text-center font-semibold">How to vote</h1>
        <div class="container mx-auto text-center ">

            <div class="lg:grid grid-cols-12 gap-4 ">
                <div class="col-span-12 md:col-span-6 mt-4 bg-white px-6 py-4">
                    <div class="flex flex-col">
                        <div class="flex">
                            <button
                                class="h-8 w-8 text-white font-semibold rounded-full text-center bg-green-500">1</button>
                            <h1 class="self-center ms-3 font-bold uppercase">Identity Verification</h1>

                        </div>
                        <ul class="self-start ml-11 list-disc text-left">
                            <li class="text-slate-500 text-md">you must be a student</li>
                            <li class="text-slate-500 text-md">Information must be registered on our system</li>
                            <li class="text-slate-500 text-md">Must have a valid student identification</li>
                          
                        </ul>
                    </div>


                </div>
                <div class="col-span-12 md:col-span-6 mt-4 bg-white px-6 py-4">

                    <div class="flex flex-col ">
                        <div class="flex">
                            <button
                                class="h-8 w-8 text-white font-semibold rounded-full text-center bg-green-500">2</button>
                            <h1 class="self-center ms-3 font-bold uppercase">Select your candidate</h1>

                        </div>
                        <ul class="self-start ml-11 list-disc text-left">
                            <li class="text-slate-500">Select the candidate to vote</li>

                        </ul>
                    </div>



                </div>
                <div class="col-span-12 md:col-span-6 mt-4  bg-white px-6 py-4">


                    <div class="flex flex-col ">
                        <div class="flex">
                            <button
                                class="h-8 w-8 text-white font-semibold rounded-full text-center bg-green-500">3</button>
                            <h1 class="self-center ms-3 font-bold uppercase">Review the select information</h1>

                        </div>
                        <ul class="self-start ml-11 list-disc text-left">
                            <li class="text-slate-500">Once you have selected a candidate, review his/her information
                                before clicking the vote button</li>

                        </ul>
                    </div>


                </div>
                <div class="col-span-12 md:col-span-6 mt-4 bg-white px-6 py-4">


                    <div class="flex flex-col ">
                        <div class="flex">
                            <button
                                class="h-8 w-8 text-white font-semibold rounded-full text-center bg-green-500">4</button>
                            <h1 class="self-center ms-3 font-bold uppercase">Complete your voting</h1>

                        </div>
                        <ul class="self-start ml-11 list-disc text-left">
                            <li class="text-slate-500">Once the vote button has been clicked your vote will be cast and
                                a feedback will be sent to you.</li>

                        </ul>
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="bg-slate-900 p-12 text-center text-white">
        <h1>IVOTE {{ now()->format('Y') }}</h1>
    </div>
</div>
