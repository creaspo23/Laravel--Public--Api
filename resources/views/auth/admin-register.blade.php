@extends('layouts.app')

@section('content')

    <!-- component -->
    <!-- Root element for center items -->
    <div class="flex flex-col h-screen bg-gray-100">
        <!-- Auth Card Container -->
        <div class="grid place-items-center mx-2 my-20 sm:my-auto">
            <!-- Auth Card -->
            <div class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12 
                                                px-6 py-10 sm:px-10 sm:py-6 
                                                bg-white rounded-lg shadow-md lg:shadow-lg">

                <!-- Card Title -->
                <h2 class="text-center font-semibold text-3xl lg:text-4xl text-gray-800">
                    Sing-up
                </h2>

                <form class="mt-10" method="POST" action="{{ route('admin.register.submit') }}">
                    @csrf
                    <!-- Email Input -->
                    <label for="name" class="block text-xs font-semibold text-gray-600 uppercase">F-Name</label>
                    <input id="name" type="name" name="name" placeholder="john Doe" autocomplete="name" class="block w-full py-3 px-1 mt-2 
                                                        text-gray-800 appearance-none 
                                                        border-b-2 border-gray-100
                                                        focus:text-gray-500 focus:outline-none focus:border-gray-200"
                        required />

                    <!-- Email Input -->
                    <label for="email" class="block text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                    <input id="email" type="email" name="email" placeholder="john@example.com" autocomplete="email" class="block w-full py-3 px-1 mt-2 
                                                        text-gray-800 appearance-none 
                                                        border-b-2 border-gray-100
                                                        focus:text-gray-500 focus:outline-none focus:border-gray-200"
                        required />

                    <!-- Password Input -->
                    <label for="password" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Password</label>
                    <input id="password" type="password" name="password" placeholder="password"
                        autocomplete="current-password" class="block w-full py-3 px-1 mt-2 mb-4
                                                        text-gray-800 appearance-none 
                                                        border-b-2 border-gray-100
                                                        focus:text-gray-500 focus:outline-none focus:border-gray-200"
                        required />

                    <!-- confirmpassword Input -->
                    <label for="confirmpassword"
                        class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Confirm-Password</label>
                    <input id="password" type="password" name="password confirmation" placeholder="confirm-password"
                        autocomplete="current-confirmpassword" class="block w-full py-3 px-1 mt-2 mb-4
                                                        text-gray-800 appearance-none 
                                                        border-b-2 border-gray-100
                                                        focus:text-gray-500 focus:outline-none focus:border-gray-200"
                        required />

                    <!-- Auth Buttton -->
                    <button type="submit" class="w-full py-3 mt-10 bg-gray-800 rounded-sm
                                                        font-medium text-white uppercase
                                                        focus:outline-none hover:bg-gray-700 hover:shadow-none">
                        Sing-up
                    </button>
                    @include('layouts.errors')
                    <!-- Another Auth Routes -->
                    <div class="sm:flex sm:flex-wrap mt-8 sm:mb-4 text-sm text-center">
                        <a href="forgot-password" class="flex-2 underline">

                        </a>

                        <p class="flex-1 text-gray-500 text-md mx-4 my-1 sm:my-auto">

                        </p>

                        <a href="{{ route('admin.login') }} " class="flex-40 underline text-x text-gray-900">
                            All Ready Have Account ?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
