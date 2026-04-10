@extends('layouts.app')

@section('title', 'Users & Roles')

@section('content')
<div class="bg-white dark:bg-zinc-900 rounded-2xl shadow-sm border border-zinc-200 dark:border-zinc-800 p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">System Users</h2>
        @can('users.create')
        <a href="{{ route('users.create') }}" class="bg-violet-600 hover:bg-violet-700 text-white px-5 py-2.5 rounded-xl font-medium transition flex items-center gap-2">
            <i class="fas fa-user-plus"></i> Add User
        </a>
        @endcan
    </div>

    @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 p-4 rounded-xl mb-6 font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-zinc-200 dark:border-zinc-800 text-sm uppercase tracking-wider text-zinc-500 dark:text-zinc-400">
                    <th class="p-4 font-semibold">User</th>
                    <th class="p-4 font-semibold">Email Address</th>
                    <th class="p-4 font-semibold">Role</th>
                    <th class="p-4 font-semibold text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr class="border-b border-zinc-100 dark:border-zinc-800/50 hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition">
                    <td class="p-4 flex items-center gap-3 font-medium">
                        <div class="w-10 h-10 rounded-full bg-violet-100 dark:bg-violet-900/30 text-violet-700 dark:text-violet-400 flex items-center justify-center font-bold">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        {{ $user->name }}
                    </td>
                    <td class="p-4 text-zinc-500 dark:text-zinc-400">{{ $user->email }}</td>
                    <td class="p-4">
                        @foreach($user->roles as $role)
                            <span class="px-3 py-1 bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 rounded-lg text-xs font-semibold border border-zinc-200 dark:border-zinc-700">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                    <td class="p-4 flex justify-end gap-2">
                        @can('users.edit')
                        <a href="{{ route('users.edit', $user) }}" class="text-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/30 w-10 h-10 flex items-center justify-center rounded-xl transition">
                            <i class="fas fa-edit"></i>
                        </a>
                        @endcan

                        @can('users.delete')
                            @if($user->id !== auth()->id())
                            <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:bg-red-50 dark:hover:bg-red-900/30 w-10 h-10 flex items-center justify-center rounded-xl transition">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @else
                            <button disabled class="text-zinc-300 dark:text-zinc-700 w-10 h-10 flex items-center justify-center rounded-xl cursor-not-allowed" title="You cannot delete yourself">
                                <i class="fas fa-trash"></i>
                            </button>
                            @endif
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-zinc-500 dark:text-zinc-400">
                        No users found in the system.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
@endsection
