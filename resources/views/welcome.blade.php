<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Tailwind CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="max-w-xl mx-auto p-6 mt-10 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4 text-center">Welcome to the Library</h1>

        <div class="mb-4">
            <label for="user-message" class="block text-sm font-medium mb-1">Ask a question:</label>
            <input type="text" id="user-message" placeholder="Ask something..."
                class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <button onclick="sendMessage()"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded">
            Send
        </button>

        <p id="response" class="mt-4 text-green-600 font-medium"></p>
    </div>

    <script>
        function sendMessage() {
            let message = document.getElementById('user-message').value;

            if (!message.trim()) {
                document.getElementById('response').innerText = 'Please enter a question.';
                return;
            }

            fetch('/chatbot', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ message })
            })
            .then(res => res.json())
            .then(data => {
                document.getElementById('response').innerText = data.answer;
            })
            .catch(error => {
                document.getElementById('response').innerText = 'An error occurred. Please try again.';
            });
        }
    </script>
</body>
</html>
