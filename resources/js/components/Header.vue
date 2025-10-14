<template>
    <header id="header" class="h-[60px] w-full bg-[#152041] flex items-center">
        <div  class="2xl:w-full 2xl:px-4 w-[1140px] mx-auto relative flex items-center justify-between">
            <div id="header" class="flex items-center relative">
                <Link href="/">
                    <img src="/images/png/gm-logo-2.png" alt="Логотип">
                </Link>
                <a href="#"><h3 class="text-white font-bold text-xl ml-3 hover:border-b-2 hover:border-white">Скидки</h3></a>
                <div class="w-[1px] h-[60px] bg-[#202e58] ml-4"></div>
                <div class="flex items-center ml-3 relative">
                    <button @click="toggleServicesDropdown" class="block text-white text-[15px] hover:opacity-80" type="button">
                        Все сервисы
                    </button>
                    <img @click="toggleServicesDropdown" src="/images/png/icons/down.png" class="w-[8px] h-[5px] ml-[10px] cursor-pointer mr-1" >
                    <div v-show="servicesDropdownOpen" @click="closeServicesDropdown" class="fixed inset-0 z-40"></div>
                    <div v-show="servicesDropdownOpen" class="absolute top-[35px] -left-12 z-50 bg-white divide-y divide-gray-100 border-4 border-[#0875AE] shadow w-44">
                        <ul class="py-2 text-sm text-gray-700">
                            <li>
                                <a href="https://mainface.ru/" class="linkHeader block hover:bg-gray-100 text-[13px] font-bold">Перейти на mainface</a>
                            </li>
                            <li>
                                <a href="https://gmcard.ru/" class="linkHeader block hover:bg-gray-100 text-[13px] font-bold">Перейти на gmcard</a>
                            </li>
                            <li>
                                <a href="#" class="linkHeader block hover:bg-gray-100 text-[13px] font-bold">Перейти на gmwork</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="auth_block relative hidden items-center ml-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" id="userAuth3" @click="openLoginModal('mobile')" stroke="currentColor" class="w-5 h-5 rounded-lg text-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
                </svg>
                <svg fill="currentColor" id="mobileBTN" :class="loginModalOpen && clickedButton === 'mobile' ? '' : 'hidden'" class="w-4 h-4 absolute -bottom-4 right-12 text-white" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"></path></svg>
                <button id="open_menu" @click="toggleMobileMenu" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <ul id="header" class="items-center list-none flex md:hidden relative">
                <li class="bg-[#f4d710] rounded-md focus:ring-2 hover:opacity-100 py-2 px-3 focus:ring-[#f4d710] relative">
                    <a @click.prevent="openLoginModal('start')" href="#" class="text-black hover:text-[#983301] cursor-pointer" id="userAuth1">Запустить акцию</a>
                    <svg v-show="loginModalOpen && clickedButton === 'start'" fill="currentColor" id="startBTN" class="w-6 h-7 absolute -bottom-8 right-14 text-white" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                </li>
                <div class="w-[1px] h-[60px] bg-[#202e58] ml-4"></div>
                <li class="relative">
                    <a @click.prevent="openLoginModal('login')" href="#" class="ml-4 text-white text-[15px] hover:border-b-2 hover:border-white " id="userAuth2" >Вход</a>
                    <svg v-show="loginModalOpen && clickedButton === 'login'" fill="currentColor" id="loginBTN" class="w-6 h-7 absolute -bottom-10 right-0 text-white" viewBox="0 0 24 11" xmlns="http://www.w3.org/2000/svg"><path d="M24 11H0L12 0L24 11Z" fill="currentColor"/></svg>
                </li>
                <li><Link :href="route('register')" class="text-[15px]  bg-[#3398cc] py-2 px-3 text-white rounded-md  hover: focus:ring-1 focus:ring-[#3398cc] ml-3">Регистрация</Link></li>
                <div class="w-[1px] h-[60px] bg-[#202e58] ml-2"></div>
                <li class="py-2 px-2 rounded-md ml-3 bg-[#222e54]"><a href="#"><img src="/images/png/icons/reg.png" alt="Войти"></a></li>
            </ul>
            <div v-show="loginModalOpen" @click="closeLoginModal" class="fixed inset-0 z-40"></div>
            <div v-show="loginModalOpen" id="userDropdown" class="z-50 bg-white rounded-lg shadow-md w-[350px] absolute top-[64px] md:top-[70px] right-4 md:right-10">
                    <div class="p-5 relative">
                        <svg @click="closeLoginModal" xmlns="http://www.w3.org/2000/svg" id="closeDrop" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 absolute top-6 right-6 opacity-50 cursor-pointer hover:opacity-100 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <div class="text-gray-900 w-[220px] relative">
                            <h2 class="text-3xl font-bold text-black">Войти в GM</h2>
                            <p class="font-medium text-base">Выполните вход для доступа ко всей системе сайтов GM</p>
                        </div>
                        <form action="" class="w-full mt-3">
                            <div class="flex flex-col">
                                <label for="email" class="text-sm mb-1 text-gray-900">Email</label>
                                <input name="email" class="border-gray-300 rounded-sm outline-none focus:ring-[#2AACF0] focus:ring-1" type="email" placeholder="Адрес эл. почты или телефон">
                            </div>
                            <div class="flex flex-col relative mt-2">
                                <label for="password" class="text-sm mb-1 text-gray-900">Пароль</label>
                                <input name="password" maxlength="16" minlength="8" class="border-gray-300 rounded-sm pr-[200px] outline-none focus:ring-[#2AACF0] focus:ring-1" type="password" placeholder="Пароль">
                                <span class="absolute bottom-2 right-3 text-black font-medium cursor-pointer hover:border-b-2 hover:border-black">Показать</span>
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <button class="py-3 px-16 text-white text-base font-bold  bg-[#023BA4] rounded-md focus:ring-2 focus:ring-[#AAAAAA] focus:bg-[#AAAAAA]">Войти</button>
                                <a href="/forgot_password.html" class="text-[#AAAAAA] hover:border-b-2 hover:border-[#AAAAAA]">Забыли пароль?</a>
                            </div>
                        </form>
                        <div class="my-3">
                            <div class="ml-3 flex items-center">
                                <span class="text-[#AAAAAA] w-full text-base">Войти через соц. сети</span>
                                <div class="h-[1px] w-[200px] opacity-50 bg-[#AAAAAA]"></div>
                            </div>
                            <div class="flex items-center gap-2 mt-2">
                                <a href="#">
                                    <svg fill="#fff" class="w-6 h-6 opacity-10 hover:opacity-100"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         viewBox="-143 145 512 512" xml:space="preserve">
                            <path d="M329,145h-432c-22.1,0-40,17.9-40,40v432c0,22.1,17.9,40,40,40h432c22.1,0,40-17.9,40-40V185C369,162.9,351.1,145,329,145z
	                            M215.2,361.2c0.1,2.2,0.1,4.5,0.1,6.8c0,69.5-52.9,149.7-149.7,149.7c-29.7,0-57.4-8.7-80.6-23.6c4.1,0.5,8.3,0.7,12.6,0.7
	                            c24.6,0,47.3-8.4,65.3-22.5c-23-0.4-42.5-15.6-49.1-36.5c3.2,0.6,6.5,0.9,9.9,0.9c4.8,0,9.5-0.6,13.9-1.9
	                            C13.5,430-4.6,408.7-4.6,383.2v-0.6c7.1,3.9,15.2,6.3,23.8,6.6c-14.1-9.4-23.4-25.6-23.4-43.8c0-9.6,2.6-18.7,7.1-26.5
	                            c26,31.9,64.7,52.8,108.4,55c-0.9-3.8-1.4-7.8-1.4-12c0-29,23.6-52.6,52.6-52.6c15.1,0,28.8,6.4,38.4,16.6
	                            c12-2.4,23.2-6.7,33.4-12.8c-3.9,12.3-12.3,22.6-23.1,29.1c10.6-1.3,20.8-4.1,30.2-8.3C234.4,344.5,225.5,353.7,215.2,361.2z" fill="#023BA4"/>
                            </svg>
                                </a>
                                <a href="#">
                                    <svg fill="#fff" class="w-6 h-6 opacity-10 hover:opacity-100" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         viewBox="-143 145 512 512" xml:space="preserve">
                            <path d="M329,145h-432c-22.1,0-40,17.9-40,40v432c0,22.1,17.9,40,40,40h432c22.1,0,40-17.9,40-40V185C369,162.9,351.1,145,329,145z
	                            M169.5,357.6l-2.9,38.3h-39.3v133H77.7v-133H51.2v-38.3h26.5v-25.7c0-11.3,0.3-28.8,8.5-39.7c8.7-11.5,20.6-19.3,41.1-19.3
	                            c33.4,0,47.4,4.8,47.4,4.8l-6.6,39.2c0,0-11-3.2-21.3-3.2c-10.3,0-19.5,3.7-19.5,14v29.9H169.5z" fill="#023BA4"/>
                            </svg>
                                </a>
                                <a href="#">
                                    <svg fill="#fff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         class="w-6 h-6 opacity-10 hover:opacity-100" viewBox="0 0 94 94" xml:space="preserve">
                            <g>
	                            <path d="M89,0H5C2.238,0,0,2.239,0,5v84c0,2.761,2.238,5,5,5h84c2.762,0,5-2.239,5-5V5C94,2.239,91.762,0,89,0z M74.869,52.943
		                            c2.562,2.5,5.271,4.854,7.572,7.617c1.018,1.22,1.978,2.48,2.709,3.899c1.041,2.024,0.101,4.247-1.713,4.366l-11.256-0.003
		                            c-2.906,0.239-5.22-0.931-7.172-2.918c-1.555-1.585-3.001-3.277-4.5-4.914c-0.611-0.673-1.259-1.306-2.025-1.806
		                            c-1.534-0.996-2.867-0.692-3.748,0.909c-0.896,1.63-1.103,3.438-1.185,5.255c-0.125,2.655-0.925,3.348-3.588,3.471
		                            c-5.69,0.268-11.091-0.596-16.108-3.463c-4.429-2.53-7.854-6.104-10.838-10.146c-5.816-7.883-10.27-16.536-14.27-25.437
		                            c-0.901-2.005-0.242-3.078,1.967-3.119c3.676-0.073,7.351-0.063,11.022-0.004c1.496,0.023,2.485,0.879,3.058,2.289
		                            c1.985,4.885,4.421,9.533,7.471,13.843c0.813,1.147,1.643,2.292,2.823,3.103c1.304,0.896,2.298,0.601,2.913-0.854
		                            c0.393-0.928,0.563-1.914,0.647-2.906c0.292-3.396,0.327-6.792-0.177-10.175c-0.315-2.116-1.507-3.483-3.617-3.883
		                            c-1.074-0.204-0.917-0.602-0.395-1.215c0.906-1.062,1.76-1.718,3.456-1.718l12.721-0.002c2.006,0.392,2.452,1.292,2.725,3.311
		                            l0.012,14.133c-0.021,0.782,0.391,3.098,1.795,3.61c1.123,0.371,1.868-0.53,2.54-1.244c3.048-3.235,5.22-7.056,7.167-11.009
		                            c0.857-1.743,1.6-3.549,2.32-5.356c0.533-1.337,1.367-1.995,2.875-1.971l12.246,0.013c0.36,0,0.729,0.004,1.086,0.063
		                            c2.062,0.355,2.627,1.243,1.99,3.257c-1.004,3.163-2.959,5.799-4.871,8.441c-2.043,2.825-4.224,5.557-6.252,8.396
		                            C72.411,49.38,72.561,50.688,74.869,52.943z" fill="#023BA4"/>
                            </g>
                            </svg>
                                </a>
                                <a href="#">
                                    <svg fill="#fff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         class="w-6 h-6 opacity-10 hover:opacity-100" viewBox="0 0 94 94" xml:space="preserve">
                            <g>
	                            <g>
		                            <path d="M47.051,37.59c5.247-0.017,9.426-4.23,9.407-9.489c-0.021-5.259-4.207-9.448-9.456-9.452
			                            c-5.293-0.005-9.52,4.259-9.479,9.566C37.562,33.454,41.788,37.612,47.051,37.59z" fill="#023BA4"/>
                                    <path d="M89,0H5C2.239,0,0,2.238,0,5v84c0,2.762,2.239,5,5,5h84c2.762,0,5-2.238,5-5V5C94,2.238,91.762,0,89,0z M47.08,8.766
			                            c10.699,0.027,19.289,8.781,19.236,19.602c-0.057,10.57-8.787,19.138-19.469,19.102c-10.576-0.036-19.248-8.803-19.188-19.396
			                            C27.722,17.365,36.4,8.734,47.08,8.766z M68.753,55.072c-2.366,2.431-5.214,4.187-8.378,5.416
			                            c-2.991,1.156-6.268,1.742-9.512,2.13c0.49,0.534,0.721,0.793,1.025,1.102c4.404,4.425,8.826,8.832,13.215,13.27
			                            c1.494,1.511,1.81,3.386,0.985,5.145c-0.901,1.925-2.916,3.188-4.894,3.052c-1.252-0.088-2.228-0.711-3.094-1.582
			                            c-3.324-3.345-6.711-6.627-9.965-10.031c-0.947-0.992-1.403-0.807-2.241,0.056c-3.343,3.442-6.738,6.831-10.155,10.2
			                            c-1.535,1.514-3.36,1.785-5.143,0.922c-1.892-0.917-3.094-2.848-3.001-4.791c0.064-1.312,0.71-2.314,1.611-3.214
			                            c4.356-4.351,8.702-8.713,13.05-13.072c0.289-0.288,0.557-0.597,0.976-1.045c-5.929-0.619-11.275-2.077-15.85-5.657
			                            c-0.567-0.445-1.154-0.875-1.674-1.373c-2.002-1.924-2.203-4.125-0.618-6.396c1.354-1.942,3.632-2.464,5.997-1.349
			                            c0.459,0.215,0.895,0.486,1.313,0.775c8.528,5.86,20.245,6.023,28.806,0.266c0.847-0.647,1.754-1.183,2.806-1.449
			                            c2.045-0.525,3.947,0.224,5.045,2.012C70.314,51.496,70.297,53.488,68.753,55.072z" fill="#023BA4"/>
	                            </g>
                            </g>
                            </svg>
                                </a>
                                <a href="#">
                                    <svg fill="#fff" class="w-8 h-8 opacity-10 hover:opacity-100" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M880 112H144c-17.7 0-32 14.3-32 32v736c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V144c0-17.7-14.3-32-32-32zM548.5 622.8c-43.9 61.8-132.1 79.8-200.9 53.3-69-26.3-118-99.2-112.1-173.5 1.5-90.9 85.2-170.6 176.1-167.5 43.6-2 84.6 16.9 118 43.6-14.3 16.2-29 31.8-44.8 46.3-40.1-27.7-97.2-35.6-137.3-3.6-57.4 39.7-60 133.4-4.8 176.1 53.7 48.7 155.2 24.5 170.1-50.1-33.6-.5-67.4 0-101-1.1-.1-20.1-.2-40.1-.1-60.2 56.2-.2 112.5-.3 168.8.2 3.3 47.3-3 97.5-32 136.5zM791 536.5c-16.8.2-33.6.3-50.4.4-.2 16.8-.3 33.6-.3 50.4H690c-.2-16.8-.2-33.5-.3-50.3-16.8-.2-33.6-.3-50.4-.5v-50.1c16.8-.2 33.6-.3 50.4-.3.1-16.8.3-33.6.4-50.4h50.2l.3 50.4c16.8.2 33.6.2 50.4.3v50.1z" fill="#023BA4"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="py-4 px-4 flex justify-between items-center  w-full bg-[#EDF4FC]">
                        <span class="text-lg font-bold">Еще не в GM?</span>
                        <Link :href="route('register')" class="py-3 px-12 text-black shadow-lg text-base font-bold  bg-white rounded-md hover:shadow-sm">Регистрация</Link>
                    </div>
            </div>
            <div class="modal_acc">
                <div id="dropdownAvatar" class="z-50 hidden bg-white border-4 border-[#0875AE] w-[350px] ">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div class="flex items-center text-lg font-bold"><img src="/assets/icons/he.png" class="w-7 h-7 mr-3" alt=""> Николай Александрович</div>
                    </div>
                    <ul class="py-2 px-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                        <li class="flex items-center justify-between border-b-2 border-b-black/5">
                            <span class="text-[15px] font-bold">Профиль</span><a href="#" class="block px-1 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Редактировать</a>
                        </li>
                        <li class="flex items-center justify-between border-b-2 border-b-black/5">
                            <span class="text-[15px] font-bold">Баланс</span><a href="#" class="block px-1 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Оперировать</a>
                        </li>
                        <li class="flex items-center justify-between border-b-2 border-b-black/5">
                            <span class="text-[15px] font-bold">Учетная запись<span class="text-[15px] text-red-500 ml-2">Стандарт</span> </span><a href="#" class="block px-1 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Повысить</a>
                        </li>
                        <li class="flex items-center justify-between border-b-2 border-b-black/5">
                            <span class="text-[15px] font-bold">Настройки и конфиденциальность</span><a href="#" class="block px-1 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Проверить</a>
                        </li>
                        <li class="flex items-center justify-between border-b-2 border-b-black/5">
                            <span class="text-[15px] font-bold">Справка</span><a href="#" class="block px-1 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Получить помощь</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a href="#" class="block text-center text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white text-[15px] font-bold">Выйти</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div v-show="mobileMenuOpen" class="max-w-full overflow-hidden bg-[#041a41]">
        <div class="py-4 px-12 bg-[#28A8EB] shadow-lg font-semibold rounded-b-md w-full animated-block">
            <ul class="flex flex-col">
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-white text-base">Главная</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-white text-base">Пользователям</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-white text-base">Кэшбек</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-white text-base">Для бизнеса</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-white text-base">Правила</a></li>
                <li class="py-3 opacity-85 hover:opacity-100"><a href="#" class="text-white text-base">Контакты</a></li>
            </ul>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

const loginModalOpen = ref(false);
const clickedButton = ref<'start' | 'login' | 'mobile' | null>(null);
const servicesDropdownOpen = ref(false);
const mobileMenuOpen = ref(false);

function openLoginModal(buttonType: 'start' | 'login' | 'mobile') {
    loginModalOpen.value = true;
    clickedButton.value = buttonType;
    servicesDropdownOpen.value = false;
    mobileMenuOpen.value = false;
}

function closeLoginModal() {
    loginModalOpen.value = false;
    clickedButton.value = null;
}

function toggleServicesDropdown() {
    servicesDropdownOpen.value = !servicesDropdownOpen.value;
}

function closeServicesDropdown() {
    servicesDropdownOpen.value = false;
}

function toggleMobileMenu() {
    mobileMenuOpen.value = !mobileMenuOpen.value;
    loginModalOpen.value = false;
}

function closeMobileMenu() {
    mobileMenuOpen.value = false;
}
</script>

<style scoped>

</style>
