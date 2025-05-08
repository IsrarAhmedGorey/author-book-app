<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        // Validate the input
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // Normalize the message
        $message = strtolower(trim($request->input('message')));

        // Response: How many authors
        if (str_contains($message, 'how many authors')) {
            $count = Author::count();
            return response()->json(['answer' => "There are $count authors."]);
        }

        // Response: How many books
        if (str_contains($message, 'how many books')) {
            $count = Book::count();
            return response()->json(['answer' => "There are $count books available."]);
        }

        // Response: Top 5 authors
        if (str_contains($message, 'top 5 authors')) {
            $topAuthors = Author::withCount('books')
                                ->orderByDesc('books_count')
                                ->take(5)
                                ->get();

            $count = $topAuthors->count();

            if ($count === 0) {
                return response()->json(['answer' => "No authors found."]);
            }

            $list = $topAuthors->pluck('name')->implode(', ');

            if ($count <= 5) {
                return response()->json(['answer' => "There are only $count authors: $list."]);
            } else {
                return response()->json(['answer' => "Top 5 authors are: $list."]);
            }
        }

        // Fallback message
        return response()->json([
            'answer' => "Sorry, I don't understand the question. Try asking:\n- How many authors are there?\n- How many books are available?\n- List top 5 authors."
        ]);
    }
}
