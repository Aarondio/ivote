<div>
    <div class="container mx-auto h-screen flex justify-center items-center">
        <div class="lg:w-1/2 p-12 rounded-sm bg-white">
            <div class="mb-4">
                <h1 class="text-2xl font-bold text-green-800 text-center uppercase">Voter Identification Number <br>
                    (VIN)</h1>
                <p class="text-center mt-2 mb-6 text-gray-500">Enter your full VIN or the last 10 digits of your VIN.</p>
            </div>
            <form action="">
                <div class="mb-6">
                    {{-- <label for="">Enter your full VIN or the last 10 digits of your VIN.</label> --}}
                    <input type="text"
                        class="w-full text-green-900 py-3 bg-slate-200 rounded-md border-slate-300 focus:border-green-700 focus:ring-0"
                        placeholder="E.g 50189638261">
                </div>
                <button
                    class="bg-green-400 rounded-md py-2 px-6 lg:px-12 lg:py-3 ring-1 ring-green-600 text-slate-900 border-0  float-end">Verify</button>
                 
            </form>
        </div>
    </div>
</div>
