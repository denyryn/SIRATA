@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')

<div class="grid grid-cols-12">
    <form action="{{ route('perihal.store') }}" method="POST" class="grid w-1/2 min-w-full col-start-1 col-end-6 grid-">
        @csrf
        <div class="mb-5">
            <label for="nama_perihal" class="block mb-2 text-sm font-medium text-gray-900 ">
                Nama Perihal
            </label>
            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="perihal" name="nama_perihal" placeholder="Masukkan Nama Perihal" required oninput="updateContent()" />
        </div>
        <div class="mb-5">
            <label for="id_kategori_surat" class="block mb-2 text-sm font-medium text-gray-900 ">
                Kategori
            </label>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="id_kategori_surat" id="id_kategori_surat" required onchange="showContent()">
                <option value="">Pilih Kategori</option>
                @foreach ($opsi_kategori as $id => $nama)
                <option value="{{ $id }}">{{ $nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-5">
            <label for="body" class="block mb-2 text-sm font-medium text-gray-900">
                Body
            </label>
            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="body" name="body" cols="30" rows="4" placeholder="Masukkan Body" oninput="updateContent()"></textarea>
        </div>
        <div class="mb-5">
            <label for="lower" class="block mb-2 text-sm font-medium text-gray-900">
                Lower
            </label>
            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="lower" name="lower" cols="30" rows="4" placeholder="Masukkan Lower" oninput="updateContent()"></textarea>
        </div>

        <button type=" submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
    </form>
    <p id="bodyContent"></p>
    <iframe id="templateFrame" class="grid h-full min-w-full col-start-7 col-end-13 border-black shadow-xl " srcdoc="{{ $rendered_template }}" frameborder="0"></iframe>
</div>

<script>
    function updateContent() {
        // Get the iframe element
        const templateFrame = document.getElementById("templateFrame");

        // Access the content document of the iframe
        const templateDocument = templateFrame.contentDocument || templateFrame.contentWindow.document;

        // Get the body element inside the iframe
        const perihalElement = templateDocument.getElementById("perihalContent");
        const bodyElement = templateDocument.getElementById("bodyContent");
        const lowerElement = templateDocument.getElementById("lowerContent");

        // Get the body data from the input in the parent document
        const perihalData = document.getElementById("perihal").value;
        const bodyData = document.getElementById("body").value;
        const lowerData = document.getElementById("lower").value;

        // Set the content of the body element in the iframe
        if (bodyElement) {
            perihalElement.innerHTML = perihalData;
            bodyElement.innerHTML = bodyData;
            lowerElement.innerHTML = lowerData;
        } else {
            console.error("Element 'body' not found in iframe.");
        }
    }
</script>

<script>

</script>

@endsection