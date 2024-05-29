@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')

    @if (
        !str_contains(strtolower($nama_status_terakhir), 'disetujui') &&
            !str_contains(strtolower($nama_status_terakhir), 'ditolak') &&
            !$data_surat['surat']->nomor_surat)
        <div class="grid grid-cols-12">
            <div class="grid w-1/2 min-w-full col-start-1 col-end-6 h-fit">
                <form action="{{ route('admin.surat.update', $data_surat['surat']->id_surat) }}" method="POST"
                    class="grid min-w-full col-start-1 col-end-6 mb-5">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label for="nomor_surat" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Nomor Surat
                        </label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            id="nomor_surat" name="nomor_surat" placeholder="Masukkan Nomor Surat" required
                            oninput="updateContent()" value="" />
                    </div>

                    <button type="submit"
                        class="text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Setujui</button>
                </form>
                <button data-modal-target="tolak-surat-modal" data-modal-toggle="tolak-surat-modal"
                    class="text-white col-start-1 col-end-6 h-fit bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Tolak</button>

            </div>
            <div class="row-start-0 col-start-7 col-end-13 p-2 rounded-[1rem] shadow-xl bg-blue-lighter">
                <button class="p-1 bg-white rounded-[0.5rem] " onclick="zoomIn()">
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
                <button class="p-1 bg-white rounded-[0.5rem] " onclick="zoomOut()">
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
                    class="w-full min-h-[70vh] max-h-screen border-black rounded-[0.5rem] overflow-scroll border-0 transform scale-100 align-middle mt-1"
                    srcdoc="{{ $rendered_template }}" frameborder="0"></iframe>
            </div>
        </div>
    @else
        <div class="flex flex-col-reverse items-start md:justify-evenly md:flex-row">
            <iframe id="templateFrame"
                class="md:w-[21cm] w-full min-h-[70vh] overflow-auto max-h-screen border-black rounded-[0.5rem] border-0 transform scale-100 align-middle mt-1"
                srcdoc="{{ $rendered_template }}" frameborder="0"></iframe>
            @if (!$data_surat['surat']->surat_selesai)
                <form action="{{ route('admin.surat.upload', $data_surat['surat']->id_surat) }}" method="POST"
                    enctype="multipart/form-data" class="">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label for="surat_selesai" class="block mb-2 text-sm font-medium text-gray-900">
                            Upload Surat yang telah disetujui
                        </label>
                        <div class="flex flex-row items-center w-full">
                            <input type="file"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                id="surat_selesai" name="surat_selesai" accept=".pdf" />
                            <button type="submit"
                                class="text-white m-1 bg-blue-700 h-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg w-[30%] text-sm sm:w-auto px-5 py-2.5 text-center">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            @else
                <a href="{{ route('admin.surat.stream', $data_surat['surat']->id_surat) }}"
                    class="text-white m-1 bg-blue-700 h-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg w-[30%] text-sm sm:w-auto px-5 py-2.5 text-center self-end md:self-auto">
                    Preview Hasil
                </a>
            @endif
        </div>
    @endif

    {{-- Include modals supaya form popup keluar --}}
    @include('admin.surat.modals.tolak')

    <script>
        // Get a reference to the iframe element
        const templateFrame = document.getElementById('templateFrame');
        let zoomLevel = 1;

        // Function to zoom the iframe content
        function zoomIn() {
            // Check if secure context allows access
            const templateDoc = templateFrame.contentDocument || templateFrame.contentWindow.document;
            if (!templateDoc) return; // Abort if document access is not allowed

            // Apply zoom using CSS transform on secure context
            templateDoc.documentElement.style.transform = `scale(${zoomLevel + 0.1})`;
            zoomLevel += 0.1;
        }

        function zoomOut() {
            // Check if secure context allows access
            const templateDoc = templateFrame.contentDocument || templateFrame.contentWindow.document;
            if (!templateDoc) return; // Abort if document access is not allowed

            // Ensure zoom doesn't go negative
            zoomLevel = Math.max(zoomLevel - 0.1, 0.1);
            templateDoc.documentElement.style.transform = `scale(${zoomLevel})`;
        }
    </script>
@endsection

