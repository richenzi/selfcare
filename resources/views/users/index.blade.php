<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--                {{ __('Users') }}--}}
            </h2>
            <x-button class="">
{{--                <a href="{{ route('users.create') }}">{{ __('Create') }}</a>--}}
            </x-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <table class="w-full whitespace-no-wrap">
                        <tr class="text-left font-bold">
                            <th class="pt-6 pb-4">Name</th>
                            <th class="px-6 pt-6 pb-4">Created at</th>
                            <th class="px-6 pt-6 pb-4">Deleted at</th>
                            <th class="px-6 pt-6 pb-4"></th>
                            <th class="px-6 pt-6 pb-4"></th>
                        </tr>

                        @forelse($users as $user)
                            <tr class="hover:bg-gray-100 focus-within:bg-gray-100">
                                <td class="border-t mt-6">
                                    {{ $user->name }}
                                </td>
                                <td class="border-t">
                                    {{ $user->created_at }}
                                </td>
                                <td class="border-t">
                                    {{ $user->deleted_at }}
                                </td>
                                <td class="border-t">
                                    <a class="underline" href="{{ route('users.show', $user->id) }}">Show</a>
                                </td>
                                <td class="border-t">
                                    @if($user->id != Auth::id())
                                        <form method="POST" action="{{ route('users.delete', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="underline">Delete</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="border-t px-6 py-4" colspan="4">No user found.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
