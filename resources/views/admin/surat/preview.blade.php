@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')

    @if (
        !str_contains(strtolower($nama_status_terakhir), 'disetujui') &&
            !str_contains(strtolower($nama_status_terakhir), 'ditolak') &&
            !$data_surat['surat']->nomor_surat)
        <div class="flex flex-col-reverse items-start md:justify-evenly md:flex-row">
            <iframe id="templateFrame"
                class="md:w-[21cm] w-full min-h-[70vh] overflow-auto max-h-screen border-black rounded-[0.5rem] border-0 transform scale-100 align-middle mt-1"
                srcdoc="{{ $rendered_template }}" frameborder="0"></iframe>

            <div class="flex flex-col w-1/4">
                @if ($data_surat['surat']->lampiran)
                    <a class="text-white flex-grow bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mb-5"
                        href="{{ route('admin.surat.lampiran', $data_surat['surat']->id_surat) }}">
                        Lihat Lampiran
                    </a>
                @endif
                <form class="flex flex-col flex-grow min-w-full"
                    action="{{ route('admin.surat.update', $data_surat['surat']->id_surat) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-2.5">
                        <label for="nomor_surat" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Nomor Surat
                        </label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            id="nomor_surat" name="nomor_surat" placeholder="Masukkan Nomor Surat" required
                            value="" />
                    </div>

                    <button type="submit"
                        class="text-white flex-grow bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Setujui</button>
                </form>
                <button data-modal-target="tolak-surat-modal" data-modal-toggle="tolak-surat-modal"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 mt-5 py-2.5 text-center">Tolak</button>
            </div>

        </div>
    @elseif (str_contains(strtolower($nama_status_terakhir), 'ditolak'))
        <div class="flex justify-center">
            <iframe id="templateFrame"
                class="md:w-[21cm] w-full min-h-[70vh] overflow-auto max-h-screen border-black rounded-[0.5rem] border-0 transform scale-100 align-middle mt-1"
                srcdoc="{{ $rendered_template }}" frameborder="0"></iframe>
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

