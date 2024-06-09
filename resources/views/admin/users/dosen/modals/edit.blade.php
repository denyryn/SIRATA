<!-- Main modal -->
<div id="edit-dosen-modal{{ $dosen->id_dosen }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Data Dosen
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="edit-dosen-modal{{ $dosen->id_dosen }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST"
                action="{{ route('admin.manage_users.dosen.update', $dosen->id_dosen) }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NIP
                        </label>
                        <input type="text" name="nip" id="nip"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketik NIP" required value="{{ $dosen->nip }}">
                    </div>
                    <div class="col-span-2">
                        <label for="nidn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NIDN
                        </label>
                        <input type="text" name="nidn" id="nidn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketik NIDN" required value="{{ $dosen->nidn }}">
                    </div>
                    <div class="col-span-2">
                        <label for="nama_dosen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama
                        </label>
                        <input type="text" name="nama_dosen" id="nama_dosen"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketik nama dosen" required value="{{ $dosen->nama_dosen }}">
                    </div>
                    <div class="col-span-2">
                        <label for="id_prodi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Homebase Prodi
                        </label>
                        <select name="id_prodi" id="id_prodi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required>
                            <option value="">Pilih Homebase Prodi</option>
                            @foreach ($data_prodi as $prodi)
                                <option value="{{ $prodi->id_prodi }}"
                                    @if ($prodi->id_prodi == $dosen->id_prodi) selected @endif>{{ $prodi->nama_prodi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="golongan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Golongan
                        </label>
                        <input type="text" name="golongan" id="golongan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketik nama golongan" required value="{{ $dosen->golongan }}">
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Edit Data
                </button>
            </form>

        </div>
    </div>
</div>

