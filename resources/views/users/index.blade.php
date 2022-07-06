<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('users.create') }}">
                <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-lg mb-6">
                    {{ __('Add User') }}
                </button>
            </a>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full mb-8">
                                <thead class="bg-white border-b">
                                <tr>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left font-bold"
                                        scope="col">
                                        Name
                                    </th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left font-bold"
                                        scope="col">
                                        Profile Pic
                                    </th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left font-bold"
                                        scope="col">
                                        Email
                                    </th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left font-bold"
                                        scope="col">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-200">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <img alt="profile pic"
                                                 class="w-20 rounded-lg"
                                                 src="{{ $user->getImageUrl() }}">
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $user->email }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a class="mr-4 text-emerald-600 hover:underline"
                                               href="{{ $user->getEditUrl() }}">
                                                Edit
                                            </a>
                                            <a class="text-red-600 hover:underline"
                                               href="#">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
