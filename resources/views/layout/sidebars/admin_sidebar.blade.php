<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 text-sm text-gray-500 rounded-lg ms-3 sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full py-4 overflow-y-auto bg-blue-500 ">

        <div class="flex flex-col items-center my-5">
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png"
                class="m-3 rounded-full h-14 sm:h-14" alt="User" />
            <div class="text-sm text-center text-white">
                <span class="block ">Admin</span>
                <span class="block ">{{ Session::has('data_user') ? Session::get('data_user')->username : 'Error' }}
                </span>
            </div>
        </div>

        <ul class="space-y-2 font-medium text-white">
            {{-- DASHOBARD --}}
            <li class="focus:bg-blue-lighter">
                <a href="{{ route('admin.index') }}" class="border-none outline-none group ">
                    <div
                        class="flex items-center justify-start w-full p-2 py-3 border-none outline-none hover:bg-blue-lighter px-7">
                        <svg class="w-5 h-5 transition duration-75" viewBox="0 0 48.00 48.00"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                stroke="#CCCCCC" stroke-width="0.9600000000000002"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>apps-large</title>
                                <g id="Layer_2" data-name="Layer 2">
                                    <g id="invisible_box" data-name="invisible box">
                                        <rect width="48" height="48" fill="none"></rect>
                                    </g>
                                    <g id="Q3_icons" data-name="Q3 icons">
                                        <g>
                                            <path
                                                d="M20,4H6A2,2,0,0,0,4,6V20a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V6A2,2,0,0,0,20,4ZM18,18H8V8H18Z">
                                            </path>
                                            <path
                                                d="M42,4H28a2,2,0,0,0-2,2V20a2,2,0,0,0,2,2H42a2,2,0,0,0,2-2V6A2,2,0,0,0,42,4ZM40,18H30V8H40Z">
                                            </path>
                                            <path
                                                d="M20,26H6a2,2,0,0,0-2,2V42a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V28A2,2,0,0,0,20,26ZM18,40H8V30H18Z">
                                            </path>
                                            <path
                                                d="M42,26H28a2,2,0,0,0-2,2V42a2,2,0,0,0,2,2H42a2,2,0,0,0,2-2V28A2,2,0,0,0,42,26ZM40,40H30V30H40Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                        <span class="ms-3">Dashboard</span>
                    </div>
                </a>
            </li>

            <li>
                <button type="button"
                    class="flex items-center justify-start w-full p-2 py-3 border-none outline-none hover:bg-blue-lighter px-7"
                    aria-controls="dropdown-master" data-collapse-toggle="dropdown-master">
                    <svg class="w-5 h-5 transition duration-75" aria-hidden="true" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M4 8L6 20H18L20 8M4 8L5.71624 9.37299C6.83218 10.2657 7.39014 10.7121 7.95256 10.7814C8.4453 10.8421 8.94299 10.7173 9.34885 10.4314C9.81211 10.1051 10.0936 9.4483 10.6565 8.13476L12 5M4 8C4.55228 8 5 7.55228 5 7C5 6.44772 4.55228 6 4 6C3.44772 6 3 6.44772 3 7C3 7.55228 3.44772 8 4 8ZM20 8L18.2838 9.373C17.1678 10.2657 16.6099 10.7121 16.0474 10.7814C15.5547 10.8421 15.057 10.7173 14.6511 10.4314C14.1879 10.1051 13.9064 9.4483 13.3435 8.13476L12 5M20 8C20.5523 8 21 7.55228 21 7C21 6.44772 20.5523 6 20 6C19.4477 6 19 6.44772 19 7C19 7.55228 19.4477 8 20 8ZM12 5C12.5523 5 13 4.55228 13 4C13 3.44772 12.5523 3 12 3C11.4477 3 11 3.44772 11 4C11 4.55228 11.4477 5 12 5ZM12 4H12.01M20 7H20.01M4 7H4.01"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </g>
                    </svg>
                    <span class="flex-1 text-left ms-3 rtl:text-right whitespace-nowrap">Master</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-master" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.prodi') }}"
                            class="flex items-center justify-start w-full p-2 pl-11 hover:bg-blue-lighter">
                            Program Studi</a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('admin.kategori') }}"
                            class="flex items-center justify-start w-full p-2 pl-11 hover:bg-blue-lighter">
                            Kategori Surat</a>
                    </li> --}}
                    <li>
                        <a href="{{ route('admin.jabatan') }}"
                            class="flex items-center justify-start w-full p-2 pl-11 hover:bg-blue-lighter">
                            Jabatan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.perihal') }}"
                            class="flex items-center justify-start w-full p-2 pl-11 hover:bg-blue-lighter">
                            Perihal
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                {{-- LAYANAN SURAT --}}
                <a href="{{ route('admin.surat.layanan') }}" class="border-none outline-none group">
                    <div
                        class="flex items-center justify-start w-full p-2 py-3 border-none outline-none hover:bg-blue-lighter px-7">
                        <svg class="w-5 h-5 transition duration-75" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M3 8L8.44992 11.6333C9.73295 12.4886 10.3745 12.9163 11.0678 13.0825C11.6806 13.2293 12.3194 13.2293 12.9322 13.0825C13.6255 12.9163 14.2671 12.4886 15.5501 11.6333L21 8M6.2 19H17.8C18.9201 19 19.4802 19 19.908 18.782C20.2843 18.5903 20.5903 18.2843 20.782 17.908C21 17.4802 21 16.9201 21 15.8V8.2C21 7.0799 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V15.8C3 16.9201 3 17.4802 3.21799 17.908C3.40973 18.2843 3.71569 18.5903 4.09202 18.782C4.51984 19 5.07989 19 6.2 19Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </g>
                        </svg>

                        <span class="ms-3">Layanan Surat</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.manage_users') }}" class="border-none outline-none group">
                    <div
                        class="flex items-center justify-start w-full p-2 py-3 border-none outline-none hover:bg-blue-lighter px-7">
                        <svg class="w-5 h-5 transition duration-75" viewBox="0 0 20 20" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>profile_round [#1342]</title>
                                <desc>Created with Sketch.</desc>
                                <defs> </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                    fill-rule="evenodd">
                                    <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -2159.000000)"
                                        fill="currentColor">
                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                            <path
                                                d="M100.562548,2016.99998 L87.4381713,2016.99998 C86.7317804,2016.99998 86.2101535,2016.30298 86.4765813,2015.66198 C87.7127655,2012.69798 90.6169306,2010.99998 93.9998492,2010.99998 C97.3837885,2010.99998 100.287954,2012.69798 101.524138,2015.66198 C101.790566,2016.30298 101.268939,2016.99998 100.562548,2016.99998 M89.9166645,2004.99998 C89.9166645,2002.79398 91.7489936,2000.99998 93.9998492,2000.99998 C96.2517256,2000.99998 98.0830339,2002.79398 98.0830339,2004.99998 C98.0830339,2007.20598 96.2517256,2008.99998 93.9998492,2008.99998 C91.7489936,2008.99998 89.9166645,2007.20598 89.9166645,2004.99998 M103.955674,2016.63598 C103.213556,2013.27698 100.892265,2010.79798 97.837022,2009.67298 C99.4560048,2008.39598 100.400241,2006.33098 100.053171,2004.06998 C99.6509769,2001.44698 97.4235996,1999.34798 94.7348224,1999.04198 C91.0232075,1998.61898 87.8750721,2001.44898 87.8750721,2004.99998 C87.8750721,2006.88998 88.7692896,2008.57398 90.1636971,2009.67298 C87.1074334,2010.79798 84.7871636,2013.27698 84.044024,2016.63598 C83.7745338,2017.85698 84.7789973,2018.99998 86.0539717,2018.99998 L101.945727,2018.99998 C103.221722,2018.99998 104.226185,2017.85698 103.955674,2016.63598"
                                                id="profile_round-[#1342]"> </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>

                        <span class="ms-3">Users</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="border-none outline-none group">
                    <div
                        class="flex items-center justify-start w-full p-2 py-3 border-none outline-none hover:bg-blue-lighter px-7">
                        <svg class="w-5 h-5 transition duration-75" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M21 12L13 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M18 15L20.913 12.087V12.087C20.961 12.039 20.961 11.961 20.913 11.913V11.913L18 9"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M16 5V4.5V4.5C16 3.67157 15.3284 3 14.5 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H14.5C15.3284 21 16 20.3284 16 19.5V19.5V19"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </g>
                        </svg>

                        <span class="ms-3">Logout</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</aside>
</div>

