<div>
    <div class="container mx-auto h-screen flex justify-center ">

        <div class="w-full p-4 rounded-sm ">
            <a onclick="history.back()" class="border cursor-pointer  border-black text-black py-1 px-3 rounded-sm hover:bg-black hover:text-white">Back</a>
            <h1 class="text-3xl my-5 text-center font-bold">{{ 'Election Results Data Center' }}</h1>

            @if ($elections->isNotEmpty())
                @foreach ($elections as $election)
                    <div class="bg-white p-6 mt-4 flex justify-between">
                        <h3 class="self-center w-3/4">{{ $election->name.' '.$election->start_date->format('Y') }}

                            @if ($election->faculty_id == 0 && $election->department_id == 0)
                            <span class="lg:font-bold"> (General Election)</span>
                            @elseif($election->faculty_id != 0 && $election->department_id == 0)
                            <span class="lg:font-bold"> ({{ $election->faculty->name }})</span>
                            @else
                            <span class="lg:font-bold"> ({{ $election->department->name .','. $election->faculty->name }})</span>
                            @endif
                        </h3>
                        <a href="{{ route('live',$election->id) }}" class="bg-green-500  text-xs font-semibold text-white px-4 py-2 rounded-md hover:bg-green-600 self-center">View</a>
                    </div>
                @endforeach

            @else 
            <div class=" col-span-12 mt-4">
                <div class="flex justify-center border-red-400 border rounded-lg p-12 bg-red-50">
                    <h1 class="text-lg">Results not available at the moment</h1>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
