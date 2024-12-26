<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel News</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <header class="bg-blue-500 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">Travel News</h1>
            <nav>
                <a href="index.php" class="text-lg hover:text-gray-200">Admin Panal</a>
                <a href="about.php" class="ml-4 text-lg hover:text-gray-200">About</a>
                <a href="contact.php" class="ml-4 text-lg hover:text-gray-200">Contact</a>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Latest Travel News</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e" alt="Beach" class="w-full h-48 object-cover rounded-t-lg">
                <h3 class="text-xl font-bold mt-4">Exciting New Destinations</h3>
                <p class="mt-2 text-gray-600">Discover the latest travel destinations that are trending this year. From exotic beaches to bustling cities, find your next adventure.</p>
                <a href="#" class="text-blue-500 hover:underline mt-4 block">Read more</a>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4" alt="Travel Tips" class="w-full h-48 object-cover rounded-t-lg">
                <h3 class="text-xl font-bold mt-4">Travel Tips for 2023</h3>
                <p class="mt-2 text-gray-600">Get the best travel tips for 2023. Learn how to save money, stay safe, and make the most of your trips with our expert advice.</p>
                <a href="#" class="text-blue-500 hover:underline mt-4 block">Read more</a>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <img src="https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0" alt="Top Destinations" class="w-full h-48 object-cover rounded-t-lg">
                <h3 class="text-xl font-bold mt-4">Top 10 Travel Destinations</h3>
                <p class="mt-2 text-gray-600">Explore the top 10 travel destinations for this year. Find out what makes these places special and why you should visit them.</p>
                <a href="#" class="text-blue-500 hover:underline mt-4 block">Read more</a>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e" alt="Adventure" class="w-full h-48 object-cover rounded-t-lg">
                <h3 class="text-xl font-bold mt-4">Adventure Awaits</h3>
                <p class="mt-2 text-gray-600">Looking for an adventure? Check out these thrilling travel experiences that will get your adrenaline pumping.</p>
                <a href="#" class="text-blue-500 hover:underline mt-4 block">Read more</a>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <img src="https://images.unsplash.com/photo-1535914254981-b5012eebbd15" alt="Mountains" class="w-full h-48 object-cover rounded-t-lg">
                <h3 class="text-xl font-bold mt-4">Mountain Escapes</h3>
                <p class="mt-2 text-gray-600">Escape to the mountains and enjoy the serene beauty of nature. Find the best mountain destinations for your next getaway.</p>
                <a href="#" class="text-blue-500 hover:underline mt-4 block">Read more</a>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb" alt="City" class="w-full h-48 object-cover rounded-t-lg">
                <h3 class="text-xl font-bold mt-4">City Breaks</h3>
                <p class="mt-2 text-gray-600">Discover the best cities to visit this year. From historic landmarks to modern attractions, find out what makes these cities unique.</p>
                <a href="#" class="text-blue-500 hover:underline mt-4 block">Read more</a>
            </div>
        </div>
    </main>
    <footer class="bg-blue-500 text-white p-4 mt-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 Travel News. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>