<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add User') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <div class="w-8/12">
                    <form action="{{ route('users.store') }}"
                          method="post">
                        @csrf
                        <div class="mb-4">
                            <label
                                for="name"
                                class="inline-block mb-1 after:content-['*'] after:text-red-600 after:font-bold"
                            >
                                {{ __('Name') }}
                            </label>
                            <input :value="old('name')"
                                   autofocus
                                   class="form-control block w-full px-4 py-3 font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   maxlength="255"
                                   name="name"
                                   placeholder="Enter Name"
                                   required
                                   type="text"
                            />
                        </div>
                        <div class="mb-4 flex flex-col">
                            <label
                                for="image"
                                class="inline-block mb-1"
                            >
                                {{ __('Image') }}
                            </label>
                            <input accept="image/*"
                                   name="image"
                                   type="file">
                        </div>
                        <div class="mb-4">
                            <label
                                for="email"
                                class="inline-block mb-1 after:content-['*'] after:text-red-600 after:font-bold"
                            >
                                {{ __('Email') }}
                            </label>
                            <input :value="old('email')"
                                   class="form-control block w-full px-4 py-3 font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   maxlength="255"
                                   name="email"
                                   placeholder="Enter Email"
                                   required
                                   type="email"
                            />
                        </div>
                        <div class="mb-4">
                            <label
                                for="password"
                                class="inline-block mb-1 after:content-['*'] after:text-red-600 after:font-bold"
                            >
                                {{ __('Password') }}
                            </label>
                            <input
                                class="form-control block w-full px-4 py-3 font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                maxlength="40"
                                minlength="8"
                                name="password"
                                placeholder="Enter Password"
                                required
                                type="password"
                            />
                        </div>
                        <div class="mb-4">
                            <label
                                for="confirm_password"
                                class="inline-block mb-1 after:content-['*'] after:text-red-600 after:font-bold"
                            >
                                {{ __('Confirm Password') }}
                            </label>
                            <input
                                class="form-control block w-full px-4 py-3 font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                maxlength="40"
                                minlength="8"
                                name="password_confirmation"
                                placeholder="Enter Password Again"
                                required
                                type="password"
                            />
                        </div>
                        <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-lg mb-6">
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
