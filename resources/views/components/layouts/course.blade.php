<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Ads Coaching by AJThompson</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
          .container {
            position: relative;
            overflow: hidden;
            width: 100%;
             /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
            padding-bottom: 0%;
          }

          /* Then style the iframe to fit in the container div with full height and width */
          .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
          } 
          
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="antialiased bg-gray-50 dark:bg-gray-900">
            <nav class="bg-black border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
              <div class="flex flex-wrap justify-between items-center">
                <div class="flex justify-start items-center">
                  <button
                    data-drawer-target="drawer-navigation"
                    data-drawer-toggle="drawer-navigation"
                    aria-controls="drawer-navigation"
                    class="p-2 mr-2 text-deepr_green-50 rounded-lg cursor-pointer md:hidden hover:text-black hover:bg-gray-100 focus:bg-deepr_green-50 focus:ring-2 focus:ring-deepr_green-50"
                  >
                    <svg
                      aria-hidden="true"
                      class="w-6 h-6"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                    <svg
                      aria-hidden="true"
                      class="hidden w-6 h-6"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                    <span class="sr-only">Toggle sidebar</span>
                  </button>
                  <a href="https://flowbite.com" class="flex items-center justify-between mr-4">
                    {{-- <img
                      src="#"
                      class="mr-3 h-8"
                      alt="AJ Logo"
                    /> --}}
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Ads Coaching</span>
                  </a>

                </div>
                <div class="flex items-center lg:order-2">
                  
                  <!-- Notifications -->
                  <button
                    type="button"
                    data-dropdown-toggle="notification-dropdown"
                    class="p-2 mr-1 text-deepr_green-50 rounded-lg hover:text-deepr_green-50 hover:bg-black focus:ring-4 focus:ring-deepr_green-50"
                  >
                    <span class="sr-only">View notifications</span>
                    <!-- Bell icon -->
                    <svg
                      aria-hidden="true"
                      class="w-6 h-6"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                      ></path>
                    </svg>
                  </button>
                  <!-- Dropdown menu -->
                  <div
                    class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 rounded-xl"
                    id="notification-dropdown">
                    <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-600 dark:text-gray-300">
                      Notifications
                    </div>
                    <div>
                      <a
                        href="#"
                        class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                        <div class="flex-shrink-0">
                          <img
                            class="w-11 h-11 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                            alt="Bonnie Green avatar"
                          />
                          <div
                            class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700 dark:border-gray-700"
                          >
                            <svg
                              aria-hidden="true"
                              class="w-3 h-3 text-white"
                              fill="currentColor"
                              viewBox="0 0 20 20"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"
                              ></path>
                              <path
                                d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"
                              ></path>
                            </svg>
                          </div>
                        </div>
                        <div class="pl-3 w-full">
                          <div
                            class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"
                          >
                            New message from
                            <span class="font-semibold text-gray-900 dark:text-white"
                              >Bonnie Green</span
                            >: "Hey, what's up? All set for the presentation?"
                          </div>
                          <div
                            class="text-xs font-medium text-primary-600 dark:text-primary-500"
                          >
                            a few moments ago
                          </div>
                        </div>
                      </a>
                    </div>
                    <a href="#" class="block py-2 text-md font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-600 dark:text-white dark:hover:underline">
                      <div class="inline-flex items-center">
                        <svg
                          aria-hidden="true"
                          class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                          <path
                            fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd"
                          ></path>
                        </svg>
                        View all
                      </div>
                    </a>
                  </div>
                  <!-- Apps -->

                  <!-- User Menu -->
                  <button
                    type="button"
                    class="flex mx-3 text-sm bg-deepr_green-50 rounded-full md:mr-0 hover:ring-2 hover:ring-deepr_green-50 focus:ring-4 focus:ring-deepr_green-50"
                    id="user-menu-button"
                    aria-expanded="false"
                    data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    <img
                      class="w-8 h-8 rounded-full"
                      src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png"
                      alt="user photo"
                    />
                  </button>
                  <!-- Dropdown menu -->
                  <div
                    class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                    id="dropdown">
                    <div class="py-3 px-4">
                      <span
                        class="block text-sm font-semibold text-gray-900 dark:text-white"
                        >{{ auth()->user()->name }}</span
                      >
                      <span
                        class="block text-sm text-gray-900 truncate dark:text-white"
                        >{{ auth()->user()->email }}</span
                      >
                    </div>
                    <ul
                      class="py-1 text-gray-700 dark:text-gray-300"
                      aria-labelledby="dropdown">
                      <li>
                        <a
                          href="{{ route('profile') }}"
                          class="block py-2 px-4 text-sm hover:bg-gray-100"
                          >My Profile</a>
                      </li>
                      <li>
                        <livewire:logout-student>
                      </li>
                  </div>
                </div> 
              </div>
            </nav>
            
            <!-- Sidebar -->
        
            <aside class="fixed top-0 left-0 z-40 w-96 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
              aria-label="Sidenav"
              id="drawer-navigation">
              <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
                <ul class="space-y-2">
                  <li>
                    <a
                      href="{{ route('members') }}"
                      class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group"
                    >
                      <svg
                        aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path
                          fill-rule="evenodd"
                          d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                      <span class="ml-3"><strong>GET STARTED: </strong>INSTRUCTIONS</span>
                    </a>
                  </li>
                  @php
                      $count = 0;//give unique id to dropdown arial-controls
                  @endphp
                  @foreach ($topics as $topic)
                    @php
                      $count++;
                    @endphp
                    <li wire:key="{{ $topic->id }}">
                      
                      <button type="button" class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-pillar{{ $count }}"
                        data-collapse-toggle="dropdown-pillar{{ $count }}">
                        <svg
                          aria-hidden="true"
                          class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                            clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap font-bold">PILLAR {{ $count }}: {{ $topic->title }}</span>
                        <svg
                          aria-hidden="true"
                          class="w-6 h-6"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                        </svg>
                      </button>
                      
                      <ul id="dropdown-pillar{{ $count }}" class="hidden py-2 space-y-2">
                        @php
                          $lcount = 0;
                        @endphp 
                        @foreach ($topic->lessons as $lesson)
                          @php
                          $lcount++;
                          @endphp 
                          <li>
                            <a href="{{ route('members.lesson',$lesson->id) }}" class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                              Lesson {{ $lcount }}: {{ $lesson->title }}</a>
                          </li>
                        @endforeach
                      </ul>

                    </li>
                  @endforeach
                </ul>
                <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                  
                  <li>
                    <a
                      href="#"
                      class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group"
                    >
                      <svg
                        aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"
                        ></path>
                      </svg>
                      <span class="ml-3">Components</span>
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group"
                    >
                      <svg
                        aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                      <span class="ml-3">Help</span>
                    </a>
                  </li>
                </ul>
              </div>

            </aside>
        
            <main class="sm:w-1/2 p-4 md:ml-96 h-auto pt-20">

              {{$slot}}
              
            </main>
            
          </div>
          <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    </body>
</html>

