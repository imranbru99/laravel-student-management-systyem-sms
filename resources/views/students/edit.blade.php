@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<div class="max-w-2xl mx-auto bg-white dark:bg-zinc-900 rounded-2xl shadow-sm border border-zinc-200 dark:border-zinc-800 p-8">
    <h2 class="text-2xl font-bold mb-6">Edit Student: {{ $student->name }}</h2>

    <form action="{{ route('students.update', $student) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-2">Full Name</label>
            <input type="text" name="name" value="{{ old('name', $student->name) }}" class="w-full px-4 py-3 rounded-xl border border-zinc-300 dark:border-zinc-700 bg-transparent focus:border-violet-500 focus:ring-1 focus:ring-violet-500 outline-none transition" required>
            @error('name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">Email Address</label>
            <input type="email" name="email" value="{{ old('email', $student->email) }}" class="w-full px-4 py-3 rounded-xl border border-zinc-300 dark:border-zinc-700 bg-transparent focus:border-violet-500 focus:ring-1 focus:ring-violet-500 outline-none transition" required>
            @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">Current Photo</label>
            @if($student->photo)
                <img src="{{ asset('storage/' . $student->photo) }}" alt="Current Photo" class="w-24 h-24 rounded-2xl object-cover mb-4 border border-zinc-200 dark:border-zinc-700">
            @else
                <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-4">No photo currently uploaded.</p>
            @endif

            <label class="block text-sm font-medium mb-2">Upload New Photo (Replaces current)</label>
            <input type="file" name="photo" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-zinc-300 dark:border-zinc-700 bg-transparent focus:border-violet-500 focus:ring-1 focus:ring-violet-500 outline-none transition file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 dark:file:bg-violet-900/30 dark:file:text-violet-400 hover:file:bg-violet-100">
            @error('photo') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-3 pt-6 border-t border-zinc-200 dark:border-zinc-800">
            <a href="{{ route('students.index') }}" class="px-6 py-3 rounded-xl border border-zinc-300 dark:border-zinc-700 hover:bg-zinc-50 dark:hover:bg-zinc-800 font-medium transition">Cancel</a>
            <button type="submit" class="bg-violet-600 hover:bg-violet-700 text-white px-6 py-3 rounded-xl font-medium transition shadow-sm">Update Student</button>
        </div>
    </form>
</div>
@endsection
