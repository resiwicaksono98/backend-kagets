<x-app-layout>
    <x-slot name="header">
        Dashboard
     </x-slot>

    <div class="flex min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="container max-w-6xl px-5 mx-auto my-28">
            <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-4">
                <div class="p-5 bg-white  rounded shadow-sm">
                    <div class="text-base text-gray-400 ">Total News</div>
                    <div class="flex items-center pt-1 justify-between">
                        <div class="text-2xl font-bold text-gray-900 ">{{ $news->count() }}</div>
                        <span class="flex items-center  py-2 mx-2 text-sm  rounded-full">
                            <img src="https://image.flaticon.com/icons/png/512/2965/2965851.png" alt=""
                                class="w-full h-12">
                        </span>
                    </div>
                </div>
                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="text-base text-gray-400 ">Total Complaint</div>
                    <div class="flex items-center pt-1 justify-between">
                        <div class="text-2xl font-bold text-gray-900 ">{{ $complaint->count() }}</div>
                        <span class="flex items-center  py-2 mx-2 text-sm  rounded-full">
                          <img src="https://image.flaticon.com/icons/png/512/792/792125.png" alt=""
                              class="w-full h-12">
                      </span>
                    </div>
                    
                </div>
                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="text-base text-gray-400 ">Complaint Verifikasi</div>
                    <div class="flex items-center pt-1 justify-between">
                        <div class="text-2xl font-bold text-gray-900 ">{{ $comp_verif->count()}}</div>
                        <span class="flex items-center  py-2 mx-2 text-sm  rounded-full">
                          <img src="https://image.flaticon.com/icons/png/512/3079/3079165.png" alt=""
                              class="w-full h-12">
                      </span>
                    </div>
                </div>
                <div class="p-5 bg-white rounded shadow-sm">
                    <div class="text-base text-gray-400 ">Users</div>
                    <div class="flex items-center pt-1 justify-between">
                        <div class="text-2xl font-bold text-gray-900 ">{{ $user->count() }}</div>
                        <span
                            class="flex items-center px-2 py-0.5 mx-2  rounded-full">
                            <img src="https://image.flaticon.com/icons/png/512/1077/1077114.png" alt=""
                                class="w-full h-12">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
