@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-semibold mb-6">{{ $author->name }}'s Details</h1>

        <h3 class="text-xl font-semibold mb-4">Books:</h3>
        <ul class="list-disc pl-6 space-y-2">
            @foreach ($author->books as $book)
                <li class="text-lg text-gray-700">{{ $book->title }}</li>
            @endforeach
        </ul>

        <div class="mt-6">
            <a href="{{ route('authors.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Back to Authors List
            </a>
        </div>
    </div>
@endsection
