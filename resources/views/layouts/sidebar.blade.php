<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
               <h1 class="ml-4 p-1">Logo</h1>
            </div>
          
        </div>
    </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('provinsi.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('provinsi.index') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <svg 
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="#000000"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <line x1="3" y1="22" x2="21" y2="22" />
                    <line x1="6" y1="18" x2="6" y2="11" />
                    <line x1="10" y1="18" x2="10" y2="11" />
                    <line x1="14" y1="18" x2="14" y2="11" />
                    <line x1="18" y1="18" x2="18" y2="11" />
                    <polygon points="12 2 20 7 4 7" />
                  </svg>
                    <span class="ms-3">Provinsi</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kabupaten.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ request()->routeIs('kabupaten.index') ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                  <svg width="24"
                  height="24" fill="#000000" width="800px" height="800px" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M9 4L9 21L18 21L18 27L23 27L23 4L9 4 z M 12.859375 8L14.900391 8L14.900391 10.015625L12.859375 10.015625L12.859375 8 z M 16.900391 8L18.859375 8L18.859375 10.015625L16.900391 10.015625L16.900391 8 z M 34 8L34 46L40.039062 46L40.039062 41.992188L42 41.992188L42 46L48 46L48 8L34 8 z M 12.859375 11.984375L14.900391 11.984375L14.900391 14L12.859375 14L12.859375 11.984375 z M 16.900391 11.984375L18.859375 11.984375L18.859375 14L16.900391 14L16.900391 11.984375 z M 42 11.992188L44 11.992188L44 14.007812L42 14.007812L42 11.992188 z M 38 12.007812L40 12.007812L40 14.021484L38 14.021484L38 12.007812 z M 37.960938 16L40 16L40 18.015625L37.960938 18.015625L37.960938 16 z M 42 16L44 16L44 18.015625L42 18.015625L42 16 z M 37.960938 19.984375L40 19.984375L40 22L37.960938 22L37.960938 19.984375 z M 42 19.984375L44 19.984375L44 22L42 22L42 19.984375 z M 2 22.992188L2 46L8 46L8 41.992188L10 42L10 46L16 46L16 22.992188L2 22.992188 z M 37.960938 23.992188L40 23.992188L40 26.007812L37.960938 26.007812L37.960938 23.992188 z M 42 23.992188L44 23.992188L44 26.007812L42 26.007812L42 23.992188 z M 6 25.992188L8.0390625 25.992188L8.0390625 28.007812L6 28.007812L6 25.992188 z M 10 25.992188L12 25.992188L12 28.007812L10 28.007812L10 25.992188 z M 37.960938 27.976562L40 27.976562L40 29.992188L37.960938 29.992188L37.960938 27.976562 z M 42 27.976562L44 27.976562L44 29.992188L42 29.992188L42 27.976562 z M 18 29L18 46L24 46L24.039062 41.992188L26 41.992188L26 46L32 46L32 29L18 29 z M 6 29.976562L8.0390625 29.976562L8.0390625 31.992188L6 31.992188L6 29.976562 z M 10 29.976562L12 29.976562L12 31.992188L10 31.992188L10 29.976562 z M 38 31.984375L40.039062 31.984375L40.039062 34L38 34L38 31.984375 z M 42 31.984375L44 31.984375L44 34L42 34L42 31.984375 z M 22 32L24 32L24 34.015625L22 34.015625L22 32 z M 26.039062 32.007812L28 32.007812L28 34.021484L26.039062 34.021484L26.039062 32.007812 z M 6 33.992188L8.0390625 33.992188L8.0390625 36.007812L6 36.007812L6 33.992188 z M 10 33.992188L12 33.992188L12 36.007812L10 36.007812L10 33.992188 z M 37.960938 35.984375L40 35.984375L40 38L37.960938 38L37.960938 35.984375 z M 42 35.984375L44 35.984375L44 38L42 38L42 35.984375 z M 26.039062 35.992188L28 35.992188L28 38.007812L26.039062 38.007812L26.039062 35.992188 z M 22 36L24 36L24 38.015625L22 38.015625L22 36 z"/></svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Kabupaten</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
