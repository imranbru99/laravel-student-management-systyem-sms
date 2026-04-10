@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<div class="max-w-2xl mx-auto bg-white dark:bg-zinc-900 rounded-2xl shadow-sm border border-zinc-200 dark:border-zinc-800 p-8">
    <h2 class="text-2xl font-bold mb-6">Create New User</h2>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-2">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 rounded-xl border border-zinc-300 dark:border-zinc-700 bg-transparent focus:border-violet-500 focus:ring-1 focus:ring-violet-500 outline-none transition" required>
            @error('name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 rounded-xl border border-zinc-300 dark:border-zinc-700 bg-transparent focus:border-violet-500 focus:ring-1 focus:ring-violet-500 outline-none transition" required>
            @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">Password</label>
            <input type="password" name="password" class="w-full px-4 py-3 rounded-xl border border-zinc-300 dark:border-zinc-700 bg-transparent focus:border-violet-500 focus:ring-1 focus:ring-violet-500 outline-none transition" required>
            @error('password') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">Assign Role</label>
            <select name="role" class="w-full px-4 py-3 rounded-xl border border-zinc-300 dark:border-zinc-700 bg-transparent focus:border-violet-500 focus:ring-1 focus:ring-violet-500 outline-none transition dark:text-zinc-100" required>
                <option value="" disabled selected class="dark:bg-zinc-900">Select a role...</option>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" class="dark:bg-zinc-900" {{ old('role') == $role->name ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
            @error('role') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-3 pt-6 border-t border-zinc-200 dark:border-zinc-800">
            <a href="{{ route('users.index') }}" class="px-6 py-3 rounded-xl border border-zinc-300 dark:border-zinc-700 hover:bg-zinc-50 dark:hover:bg-zinc-800 font-medium transition">Cancel</a>
            <button type="submit" class="bg-violet-600 hover:bg-violet-700 text-white px-6 py-3 rounded-xl font-medium transition shadow-sm">Save User</button>
        </div>
    </form>
</div>
@endsection
