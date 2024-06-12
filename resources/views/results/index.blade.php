@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-2xl font-semibold mb-4">Results</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (auth()->user()->isStaff() || auth()->user()->isAdmin())
    <form action="{{ route('manageResult') }}" method="GET" class="mb-4">
        <div class="flex items-center">
            <label for="subject" class="mr-2">Filter by Subject:</label>
            <select name="subject" id="subject" class="border rounded-md px-2 py-1">
                <option value="">All Subjects</option>
                @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
                @endforeach
            </select>
            <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-black font-bold py-1 px-3 rounded">
                Filter
            </button>
        </div>
    </form>
    @endif

    <table class="w-full table-auto border-collapse border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Student</th>
                <th class="border px-4 py-2">Subject</th>
                <th class="border px-4 py-2">Assessment</th>
                <th class="border px-4 py-2">Score</th>
                <th class="border px-4 py-2">Grade</th>
                @if(auth()->user()->isStaff() || auth()->user()->isAdmin())
                <th class="border px-4 py-2">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($results as $result)
            <tr>
                <td class="border px-4 py-2">{{ $result->user->name }}</td>
                <td class="border px-4 py-2">{{ $result->assessment->subject->name }}</td>
                <td class="border px-4 py-2">{{ $result->assessment->name }}</td>
                <td class="border px-4 py-2">{{ $result->score }}</td>
                <td class="border px-4 py-2">{{ $result->grade }}</td>
                @if(auth()->user()->isStaff() || auth()->user()->isAdmin())
                <td class="border px-4 py-2">
                    <a href="{{ route('results.edit', $result) }}" class="text-blue-500 hover:text-blue-700">Edit</a>

                    <form method="POST" action="{{ route('results.destroy', $result) }}" style="display: inline;" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                    </form>
                </td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="6" class="border px-4 py-2 text-center">No results found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if (auth()->user()->isStaff() || auth()->user()->isAdmin())
    <div class="mt-4">
        <a href="{{ route('manageResult.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Create New Result
        </a>
    </div>
    @endif
</div>
@endsection

