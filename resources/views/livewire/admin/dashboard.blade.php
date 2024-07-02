<div class="container mx-auto  px-4 mt-4">
    <h1 class="font-bold text-2xl my-3">Dashboard</h1>
    <div class="gap-4 grid-flow-row grid-cols-12 md:grid">
        <div class="bg-white border lg:col-span-3 md:col-span-6  p-6 rounded-lg mt-4 md:mt-0 box-sizing shadow-sm">
            <h1 class="font-semibold text-3xl mb-3 ">{{ $elections }}</h1>
            <p class="text-slate-500">Elections records</p>
        </div>
        <div class="bg-white border lg:col-span-3 md:col-span-6  p-6 rounded-lg mt-4 md:mt-0 box-sizing shadow-sm">
            <h1 class="font-semibold text-3xl mb-3">{{ $parties }}</h1>
            <p class="text-slate-500">Registered Parties</p> 
        </div>
        <div class="bg-white border lg:col-span-3 md:col-span-6  p-6 rounded-lg mt-4 md:mt-0 box-sizing shadow-sm">
            <h1 class="font-semibold text-3xl mb-3">{{ $users }}</h1>
            <p class="text-slate-500">Registered users</p>
        </div>
        <div class="bg-green-100 border-green-500 border lg:col-span-3 md:col-span-6  p-6 rounded-lg mt-4 md:mt-0 box-sizing shadow-sm">
            <h1 class="font-semibold text-xl text-green-800 mb-3">{{ now()->format("Y M D") }}</h1>
            <p class="text-slate-900">Today's Date</p>
        </div>

    </div>

</div>
