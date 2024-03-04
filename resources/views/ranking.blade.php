<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-bold text-xl text-blue-800 leading-tight">
            Tracking by ANDF
        </h2>
    </x-slot> --}}

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-300 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-5 ml-6 font-bold text-4xl text-slate-950 flex items-center">
                    Gerenciamiento

                    <span class="font-normal text-lg text-custom-morado ml-6 mt-3">
                        Ranking |
                    </span>
                </div>

                <hr class="w-3/4 h-1 mx-auto my-4 bg-custom-morado border-0 rounded md:my-5">

                @php
                    $ranking = 1;
                @endphp

                @foreach ($usuarios as $usuario)
                    <div class="mb-4">
                        <div class="mx-auto max-w-5xl bg-purple-300 border border-custom-morado rounded-lg shadow">
                            <div class="p-5 flex items-center">
                                <span class="text-2xl text-custom-morado ">
                                    {{ $ranking }}
                                </span>
                                <svg class="ml-4 w-6 h-6 text-custom-morado" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 18">
                                    <path
                                        d="M7 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm2 1H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                                </svg>
                                <div class="ml-4 text-2xl text-center font-bold tracking-tight text-custom-morado">
                                    {{ $usuario->name }} <br>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $ranking++;
                    @endphp
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
