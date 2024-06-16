<!-- Main modal -->
<div id="ubah-profil-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Ubah Profil
                </h3>
                <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="ubah-profil-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="{{ route('dosen.profile.update') }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="flex justify-center col-span-2">
                        <div class="py-5 duration-150 md:pb-5 brightness-75 hover:brightness-50">
                            <label for="foto_profil" class="cursor-pointer">
                                <input id="foto_profil" name="foto_profil" class="hidden" type="file"
                                    onchange="loadFile(event)" />
                                <img id="new_profile_image_preview" class="rounded-sm size-40" <img
                                    src="{{ asset($data_user->foto_profil ? $data_user->foto_profil : 'images/blank_profile.png') }}"
                                    alt="Profile Picture">
                            </label>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NIP
                        </label>
                        <input type="text" name="nip" id="nip"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketik NIM" required value="{{ $data_dosen->nip }}" disabled>
                    </div>
                    <div class="col-span-2">
                        <label for="nama_dosen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama dosen
                        </label>
                        <input type="text" name="nama_dosen" id="nama_dosen"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketik Nama dosen" required value="{{ $data_dosen->nama_dosen }}" disabled>
                    </div>
                    <div class="col-span-2">
                        <label for="nidn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NIDN
                        </label>
                        <input type="text" name="nidn" id="nidn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Pilih Dosen Pembimbing" required value="{{ $data_dosen->nidn }}" disabled>
                    </div>
                    <div class="col-span-2">
                        <label for="id_program_studi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Homebase Program Studi
                        </label>
                        <input type="text" name="id_program_studi" id="id_program_studi"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketik NIM" required value="{{ $data_dosen->program_studi->nama_prodi }}"
                            disabled>
                    </div>
                    <div class="col-span-2">
                        <label for="golongan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Golongan
                        </label>
                        <input type="text" name="golongan" id="golongan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketik Golongan" required value="{{ $data_dosen->golongan }}">
                    </div>
                    <div class="col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Email
                        </label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ketik Email baru" required value="{{ $data_user->email }}">
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Ubah Profil
                </button>
            </form>

        </div>
    </div>
</div>

