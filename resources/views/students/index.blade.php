@extends('layouts.app')

@section('title', 'Students List')

@section('content')
<div class="bg-white dark:bg-zinc-900 rounded-2xl shadow-sm border border-zinc-200 dark:border-zinc-800 p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">All Students</h2>
        @can('students.create')
        <a href="{{ route('students.create') }}" class="bg-violet-600 hover:bg-violet-700 text-white px-5 py-2.5 rounded-xl font-medium transition flex items-center gap-2">
            <i class="fas fa-plus"></i> Add Student
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
                    <th class="p-4 font-semibold">Photo</th>
                    <th class="p-4 font-semibold">Name</th>
                    <th class="p-4 font-semibold">Email</th>
                    <th class="p-4 font-semibold text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr class="border-b border-zinc-100 dark:border-zinc-800/50 hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition">
                    <td class="p-4">
                        @if($student->photo)
                            <img src="{{ asset('storage/' . $student->photo) }}" alt="{{ $student->name }}" class="w-12 h-12 rounded-full object-cover border border-zinc-200 dark:border-zinc-700">
                        @else
                            <div class="w-12 h-12 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center border border-zinc-200 dark:border-zinc-700">
                                <i class="fas fa-user text-zinc-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="p-4 font-medium">{{ $student->name }}</td>
                    <td class="p-4 text-zinc-500 dark:text-zinc-400">{{ $student->email }}</td>
                    <td class="p-4 flex justify-end gap-2">
                        @can('students.edit')
                        <a href="{{ route('students.edit', $student) }}" class="text-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/30 w-10 h-10 flex items-center justify-center rounded-xl transition">
                            <i class="fas fa-edit"></i>
                        </a>
                        @endcan

                        @can('students.delete')
                        <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:bg-red-50 dark:hover:bg-red-900/30 w-10 h-10 flex items-center justify-center rounded-xl transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-zinc-500 dark:text-zinc-400">
                        No students found. Click "Add Student" to create one.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $students->links() }}
    </div>
</div>
@endsection
