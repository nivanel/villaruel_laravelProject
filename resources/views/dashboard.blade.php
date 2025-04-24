{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <!-- Add Student Form -->
            <div class="mb-6">
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">{{ session('success') }}</strong>
                    <span class="block sm:inline">Student has been added successfully</span>
                </div>
            @endif
                @if(session('deleted'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">{{ session('deleted') }}</strong>
                    <span class="block sm:inline">Student has been added successfully</span>
                </div>
            @endif
                <h3 class="text-lg font-medium mb-4">Add New Student</h3>
                <form method="POST" action="{{ route('student.store') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-gray-700">Name</label>
                            <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="phone" class="block text-gray-700">Phone</label>
                            <input type="text" id="phone" name="phone" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label for="address" class="block text-gray-700">Address</label>
                            <input type="text" id="address" name="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Student</button>
                        </div>
                    </div>
                </form>
            </div>


            <!-- Student List Table -->
            <div class="mt-8">
                <h3 class="text-lg font-medium mb-4">Student List</h3>
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr>
                            <th class="py-2 border-b">#</th>
                            <th class="py-2 border-b">Name</th>
                            <th class="py-2 border-b">Email</th>
                            <th class="py-2 border-b">Phone</th>
                            <th class="py-2 border-b">Address</th>
                            <th class="py-2 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="student-table">
                        @foreach ($students as $key => $student)
                            <tr>
                                <td class="py-2 border-b px-4 text-center">{{ $key +1 }}</td>
                                <td class="py-2 border-b px-4 text-center">{{ $student->name }}</td>
                                <td class="py-2 border-b px-4 text-center">{{ $student->email }}</td>
                                <td class="py-2 border-b px-4 text-center">{{ $student->phone }}</td>
                                <td class="py-2 border-b px-4 text-center">{{ $student->address }}</td>
                                <td class="py-2 border-b px-4 text-center">
                                    <a href="{{ route('student.edit', $student->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <form method="POST" action="{{ route('student.destroy', $student->id) }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=text-red-500 hover:text-red-700>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</x-app-layout> --}}



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Feedback') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-md mx-auto">
                        <h2 class="text-2xl font-bold mb-6 text-gray-800">Share Your Feedback</h2>

                        <form id="feedbackForm" class="space-y-6">
                            @csrf

                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    placeholder="John Doe"
                                >
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    placeholder="you@example.com"
                                >
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">Your Feedback</label>
                                <textarea
                                    id="message"
                                    name="message"
                                    rows="4"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    placeholder="Your thoughts...">
                                </textarea>
                            </div>

                            <div>
                                <button
                                    type="submit"
                                    id="submitButton"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                >
                                    <span id="buttonText">Submit Feedback</span>
                                    <span id="spinner" class="hidden ml-2">
                                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0
                                            12h4zm2 5.291A7.962 7.962 0 014 12H0a3.042 3.042 1.135 5.824 3  7.93813-2.647z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>

                            <!-- Response Messages -->
                            <div id="responseMessage" class="hidden p-4 rounded-lg"></div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('feedbackForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitButton = document.getElementById('submitButton');
            const buttonText = document.getElementById('buttonText');
            const spinner = document.getElementById('spinner');
            const responseMessage = document.getElementById('responseMessage');

            submitButton.disabled = true;
            buttonText.textContent = 'Processing...';
            spinner.classList.remove('hidden');
            responseMessage.classList.add('hidden');

            const payload = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                message: document.getElementById('message').value
            };

            try {
            const response = await fetch('/feedback', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(payload)
            });

            const data = await response.json();

            responseMessage.classList.remove('hidden');
            if (response.ok && data.success) {
                responseMessage.className = 'p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg';
                responseMessage.innerHTML = `
                    <strong>Success!</strong> ${data.message}
                    <div class="mt-2">We've sent a confirmation to ${payload.email}.</div>
                `;
                this.reset();
            } else {
                throw new Error(data.message || 'Failed to submit feedback');
            }
        } catch (error) {
            responseMessage.className = 'p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg';
            responseMessage.textContent = `Error: ${error.message}`;
            console.error('Submission error:', error);
        } finally {
            submitButton.disabled = false;
            buttonText.textContent = 'Submit Feedback';
            spinner.classList.add('hidden');

            if (responseMessage.classList.contains('hidden') === false) {
                setTimeout(() => {
                    responseMessage.classList.add('hidden');
                }, 5000);
            }
        }
    });
    </script>
</x-app-layout>
