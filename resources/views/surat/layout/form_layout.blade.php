@extends('layout.layout')

@section('title', 'Layanan')
@section('header', 'Sirata / Layanan Surat')

@section('content')
    <div class="flex flex-row">

        @yield('form')

        <div class="w-[50vw] sticky ml-5 max-h-[100vh] p-2 rounded-[1rem] shadow-xl bg-blue-lighter top-1">
            <button class="p-1 bg-white rounded-[0.5rem]" onclick="zoomIn()">
                <svg class="text-gray-700 size-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4 11C4 7.13401 7.13401 4 11 4C14.866 4 18 7.13401 18 11C18 14.866 14.866 18 11 18C7.13401 18 4 14.866 4 11ZM11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C13.125 20 15.078 19.2635 16.6177 18.0319L20.2929 21.7071C20.6834 22.0976 21.3166 22.0976 21.7071 21.7071C22.0976 21.3166 22.0976 20.6834 21.7071 20.2929L18.0319 16.6177C19.2635 15.078 20 13.125 20 11C20 6.02944 15.9706 2 11 2Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M10 14C10 14.5523 10.4477 15 11 15C11.5523 15 12 14.5523 12 14V12H14C14.5523 12 15 11.5523 15 11C15 10.4477 14.5523 10 14 10H12V8C12 7.44772 11.5523 7 11 7C10.4477 7 10 7.44772 10 8V10H8C7.44772 10 7 10.4477 7 11C7 11.5523 7.44772 12 8 12H10V14Z"
                            fill="currentColor"></path>
                    </g>
                </svg>
            </button>
            <button class="p-1 bg-white rounded-[0.5rem]" onclick="zoomOut()">
                <svg class="text-gray-700 size-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M4 11C4 7.13401 7.13401 4 11 4C14.866 4 18 7.13401 18 11C18 14.866 14.866 18 11 18C7.13401 18 4 14.866 4 11ZM11 2C6.02944 2 2 6.02944 2 11C2 15.9706 6.02944 20 11 20C13.125 20 15.078 19.2635 16.6177 18.0319L20.2929 21.7071C20.6834 22.0976 21.3166 22.0976 21.7071 21.7071C22.0976 21.3166 22.0976 20.6834 21.7071 20.2929L18.0319 16.6177C19.2635 15.078 20 13.125 20 11C20 6.02944 15.9706 2 11 2Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7 11C7 10.4477 7.44772 10 8 10H14C14.5523 10 15 10.4477 15 11C15 11.5523 14.5523 12 14 12H8C7.44772 12 7 11.5523 7 11Z"
                            fill="currentColor"></path>
                    </g>
                </svg>
            </button>
            <iframe id="templateFrame"
                class="w-full h-[92%] border-black rounded-[0.5rem] overflow-scroll border-0 transform scale-100 align-middle mt-1"
                srcdoc="{{ $rendered_template }}" frameborder="0"></iframe>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.id_user').select2({
                placeholder: 'Pilih Pengaju',
                allowClear: true,
            });
        });
    </script>

    <script>
        @if ($peruntukkan == 'dosen')
            const dosens = @json(isset($dosens) ? $dosens : []);
        @else
            const mahasiswas = @json(isset($mahasiswas) ? $mahasiswas : []);
        @endif
    </script>
    <script src="{{ asset('js/suratForm/indonesiaDays.js') }}"></script>
    <script src="{{ asset('js/suratForm/indonesiaMonths.js') }}"></script>
    <script src="{{ asset('js/suratForm/updateContent.js') }}"></script>

    <script src="{{ asset('js/suratForm/handleMultiplePengaju.js') }}"></script>
    <script src="{{ asset('js/suratForm/previewZoom.js') }}"></script>

    <script src="{{ asset('js/suratForm/handleTextareas.js') }}"></script>

@endsection

