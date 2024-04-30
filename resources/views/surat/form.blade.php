@extends('layout.layout')

@section('title', 'Layanan')
@section('header', 'Sirata / Layanan Surat')

@section('content')
    <div class="grid grid-cols-12">
        <form id="surat_form" action="{{ route(Session::get('akses') . '.surat.form.store') }}" method="POST"
            class="grid w-1/2 min-w-full col-start-1 col-end-6 grid-">
            @csrf
            @method('POST')

            <input type="number" id="id_kategori_surat" name="id_kategori_surat" hidden
                value="{{ $data_perihal->id_kategori_surat }}" />

            <div class="mb-5">
                <label for="id_user1" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Pengaju
                </label>
                <div class="flex flex-row items-end w-full">
                    <div id="pengajuContainer" class="flex flex-col w-full">

                        <select
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1"
                            name="id_user1" id="id_user1" required>
                            <option value="">Pilih Mahasiswa Pengaju</option>
                            @if (Session::get('akses') == 'mahasiswa')
                                @foreach ($mahasiswas as $mahasiswa)
                                    <option value="{{ $mahasiswa->id_user }}"
                                        {{ $mahasiswa->id_user == $user_sekarang->id_user ? 'selected' : 'hidden' }}>
                                        {{ $mahasiswa->nama_mahasiswa }}
                                    </option>
                                    {{-- <p id="nim_pengaju" hidden onloadStart="updateContent()">$mahasiswa->nim</p>
                                    <p id="nama_pengaju" hidden onloadstart="updateContent()"> --}}
                                    {{ $mahasiswa->nama_mahasiswa }}
                                    </p>
                                @endforeach
                            @elseif (Session::get('akses') == 'dosen')
                                @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id_user }}"
                                        {{ $dosen->id_user == $user_sekarang->id_user ? 'selected' : 'hidden' }}>
                                        {{ $dosen->nama_dosen }}
                                    </option>
                                    {{ $dosen->nama_dosen }}
                                    </p>
                                @endforeach
                            @else
                                @foreach ($mahasiswas as $mahasiswa)
                                    <option value="{{ $mahasiswa->id_user }}">
                                        {{ $mahasiswa->nama_mahasiswa }}
                                    </option>
                                @endforeach
                            @endif
                        </select>

                    </div>
                    <button class="ml-1 text-xl text-white btn bg-blue-light hover:bg-blue-plain" type="button"
                        id="removePengajuBtn"> - </button>
                    <button class="ml-1 text-xl text-white btn bg-blue-light hover:bg-blue-plain" type="button"
                        id="addPengajuBtn"> + </button>
                </div>
            </div>
            <div class="mb-5">
                <label for="nama_perihal" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Nama Perihal
                </label>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    id="perihal" name="nama_perihal" placeholder="Masukkan Nama Perihal" required
                    oninput="updateContent()" value="{{ $data_perihal->nama_perihal }}" />
            </div>
            <div class="mb-5">
                <label for="nama_tujuan" class="block mb-2 text-sm font-medium text-gray-900">
                    Nama Tujuan
                </label>
                <textarea
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    id="nama_tujuan" name="nama_tujuan" cols="30" rows="2" placeholder="Masukkan Nama Tujuan"
                    oninput="updateContent()">{{ $data_perihal->nama_tujuan }}</textarea>
            </div>
            <div class="mb-5">
                <label for="alamat_tujuan" class="block mb-2 text-sm font-medium text-gray-900">
                    Alamat Tujuan
                </label>
                <textarea
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    id="alamat_tujuan" name="alamat_tujuan" cols="30" rows="2" placeholder="Masukkan Alamat Tujuan"
                    oninput="updateContent()">{{ $data_perihal->alamat_tujuan }}</textarea>
            </div>
            <div class="mb-5">
                <label for="upper_body" class="block mb-2 text-sm font-medium text-gray-900">
                    Upper Body
                </label>
                <textarea
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    id="upper_body" name="upper_body" cols="30" rows="4" placeholder="Masukkan Upper Body"
                    oninput="updateContent()">{{ $data_perihal->upper_body }}</textarea>
            </div>
            <div class="mb-5">
                <label for="lower_body" class="block mb-2 text-sm font-medium text-gray-900">
                    Lower Body
                </label>
                <textarea
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    id="lower_body" name="lower_body" cols="30" rows="4" placeholder="Masukkan Lower Body"
                    oninput="updateContent()">{{ $data_perihal->lower_body }}</textarea>
            </div>

            <button type=" submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>
        <div class="col-start-7 col-end-13 p-2 rounded-[1rem] shadow-xl bg-blue-lighter">
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
                class="w-full h-[92%] border-black rounded-[0.5rem] overflow-scroll border-0 transform scale-100 align-middle mt-1"
                srcdoc="{{ $rendered_template }}" frameborder="0"></iframe>
        </div>
    </div>

    <script>
        function updateContent() {
            // Get the iframe element
            const templateFrame = document.getElementById("templateFrame");

            // Access the content document of the iframe
            const templateDocument = templateFrame.contentDocument || templateFrame.contentWindow.document;

            // Get the body element inside the iframe
            const perihalElement = templateDocument.getElementById("perihalContent");
            const namaTujuanElement = templateDocument.getElementById("namaTujuanContent");
            const alamatTujuanElement = templateDocument.getElementById("alamatTujuanContent");
            const upperBodyElement = templateDocument.getElementById("upperBodyContent");
            const lowerBodyElement = templateDocument.getElementById("lowerBodyContent");
            const namaPengajuElement = templateDocument.getElementById("namaPengajuContent");
            const nimPengajuElement = templateDocument.getElementById("nimPengajuContent");

            // Get the body data from the input in the parent document
            const perihalData = document.getElementById("perihal").value;
            const namaTujuanData = document.getElementById("nama_tujuan").value;
            const alamatTujuanData = document.getElementById("alamat_tujuan").value;
            const upperBodyData = document.getElementById("upper_body").value;
            const lowerBodyData = document.getElementById("lower_body").value;
            const namaPengajuData = document.getElementById("nama_pengaju").value;
            const nimPengajuData = document.getElementById("nim_pengaju").value;

            perihalElement.innerHTML = perihalData;
            namaTujuanElement.innerHTML = namaTujuanData;
            alamatTujuanElement.innerHTML = alamatTujuanData;
            upperBodyElement.innerHTML = upperBodyData;
            lowerBodyElement.innerHTML = lowerBodyData;
            namaPengajuElement.innerHTML = namaPengajuData;
            nimPengajuElement.innerHTML = nimPengajuData;
        }
    </script>

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

    <script>
        const textarea = document.getElementById('lower_body');

        textarea.addEventListener('keydown', function(event) {
            // Check if Enter key is pressed (key code 13)
            if (event.keyCode === 13) {
                // Prevent the default behavior of the Enter key
                event.preventDefault();

                // Insert <br> tag at the cursor position
                const cursorPos = textarea.selectionStart;
                const textBeforeCursor = textarea.value.substring(0, cursorPos);
                const textAfterCursor = textarea.value.substring(cursorPos);
                textarea.value = textBeforeCursor + '<br>\n' + textAfterCursor;

                // Move the cursor position after the inserted <br> tag
                const newPos = cursorPos + 5; // 4 characters for <br>
                textarea.setSelectionRange(newPos, newPos);
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.getElementById('pengajuContainer');
            const addButton = document.getElementById('addPengajuBtn');
            const removeButton = document.getElementById('removePengajuBtn');
            const form = document.getElementById('surat_form');
            let newOption;

            let count = 1;

            addButton.addEventListener('click', function() {
                if (count <= 8) {
                    count++;

                    const newSelect = createSelectElement(count);
                    container.appendChild(newSelect);
                } else {
                    alert('Maximum limit reached (8)');
                }
            });

            removeButton.addEventListener('click', function() {
                if (count > 1) {
                    count--;
                    container.removeChild(container.lastElementChild);
                }
            });

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Get all select elements
                const selectElements = document.querySelectorAll('select[name^="id_user"]');
                const selectedValues = {};

                // Loop through select elements and get selected values
                selectElements.forEach(function(select) {
                    const selectedOption = select.options[select.selectedIndex];
                    if (selectedOption.value !== '') {
                        const name = select.getAttribute('name');
                        selectedValues[name] = selectedOption.value;
                    }
                });

                // Set the selected values to hidden input fields in the form
                Object.keys(selectedValues).forEach(function(key) {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', key);
                    hiddenInput.setAttribute('value', selectedValues[key]);
                    form.appendChild(hiddenInput);
                });

                // Set the final count value to a hidden input field in the form
                const countInput = document.createElement('input');
                countInput.setAttribute('type', 'hidden');
                countInput.setAttribute('name', 'count');
                countInput.setAttribute('value', count);
                form.appendChild(countInput);

                // Submit the form
                form.submit();
            });

            function createSelectElement(index) {
                    const newSelect = document.createElement('select');
                    newSelect.setAttribute('class',
                        'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1'
                    );
                    newSelect.setAttribute('name', `id_user${index}`); // Gunakan notasi array untuk pilihan ganda
                    newSelect.setAttribute('id', `id_user${index}`); // Gunakan notasi array untuk pilihan ganda
                    newSelect.setAttribute('required', 'required');

                    const option = document.createElement('option');
                    option.setAttribute('value', '');
                    option.textContent = 'Pilih Pengguna';
                    newSelect.appendChild(option);

                    // Tambahkan opsi berdasarkan hak akses pengguna
                    @if (Session::get('akses') === 'mahasiswa')
                        // Buat elemen opsi baru untuk setiap mahasiswa
                        @foreach ($mahasiswas as $mahasiswa)
                            newOption = document.createElement('option');
                            newOption.setAttribute('value', '{{ $mahasiswa->id_user }}');
                            newOption.textContent = '{{ $mahasiswa->nama_mahasiswa }}';
                            newSelect.appendChild(newOption);
                        @endforeach
                    @elseif (Session::get('akses') === 'dosen')
                        // Buat elemen opsi baru untuk setiap dosen
                        @foreach ($dosens as $dosen)
                            newOption = document.createElement('option');
                            newOption.setAttribute('value', '{{ $dosen->id_user }}');
                            newOption.textContent = '{{ $dosen->nama_dosen }}';
                            newSelect.appendChild(newOption);
                        @endforeach
                    @endif

                    return newSelect;
                }

        });
    </script>
@endsection

