<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Admin Login</h2>
        
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-2" for="email">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') is-invalid @enderror" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-2" for="password">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') is-invalid @enderror" required>
            
            </div>
                <!-- Display any other errors -->
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="flex justify-between items-center mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="text-blue-500">
                    <span class="ml-2 text-gray-600 text-sm">Remember me</span>
                </label>
                <a href="#" class="text-sm text-blue-500 hover:underline">Forgot password?</a>
            </div>
            
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition">Login</button>
        </form>
    </div>
</body>
</html>

