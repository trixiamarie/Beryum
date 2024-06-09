<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Post::factory(10)->create();

        Post::create([
            'user_id' => 2,
            'content' => "I'm excited to announce a new feature that lets you create personalized quizzes tailored just for you! Whether you're a beginner or an expert, you can now select the number of questions and the level of complexity for a quiz that perfectly matches your needs.

            🌟 Explore IT-Themed Questions 🌟
            Dive into an extensive database filled with questions on various IT topics! From programming to cybersecurity, networking to the history of computing, there's something for everyone. Challenge yourself with a variety of stimulating and educational questions.
            
            📊 Get Your Performance Evaluated 📊
            After completing the quiz, you'll receive a score expressed as a percentage, reflecting your performance. This helps you understand your current knowledge level and pinpoint areas for improvement.
            
            Start your customized quiz journey today and elevate your IT skills to the next level!
            
            #CustomQuiz #ITQuiz #Programming #Cybersecurity #Networking #KnowledgeAssessment #LearnAndGrow", 
            'recipe_id' => "1",
            'image_url' => "images/BW1-1.jpg",  
        ]);
        Post::create([
            'user_id' => 2,
            'content' => "🚀 Spotify Clone Features! 🚀

            🎵 Intuitive Navigation
            The user interface offers intuitive navigation, allowing you to easily explore various sections of the application, such as new releases, popular playlists, and more.
            
            🔍 Advanced Search
            Utilize the search bar to look for artists, tracks, or albums of interest. The search is fast and accurate, providing relevant results in real-time.
            
            ❤️ Favorite Saving
            Save your favorite songs and artists for easy access later. This feature allows you to create a personalized music library that reflects your tastes and preferences.
            
            🎧 Audio Preview Playback
            Using the StriveSchool API, listen to 30-second audio previews of music tracks. This feature gives you a taste of the available music, helping you discover new songs and artists.
            
            #SpotifyClone #MusicApp #IntuitiveNavigation #AdvancedSearch #FavoriteSongs #AudioPreviews #MusicDiscovery", 
            'recipe_id' => "2",
            'image_url' => "images/BW2-1.jpg",  
        ]);
        Post::create([
            'user_id' => 2,
            'content' => "I'm thrilled to present a simplified clone of the LinkedIn user interface, developed with React, Axios, and Redux. This application leverages API calls to retrieve and display data, offering a LinkedIn-like experience for browsing user profiles and posting updates.

            Key Features
            👤 User Profile Viewing: View detailed profiles of other users.
            ✏️ Post Creation: Create and share your own posts.
            📜 Post Feed: Enjoy a dynamic feed that displays posts from various users.
            🔄 State Management with Redux: Experience efficient state management across the application.
            🌐 API Calls with Axios: Fetch data and interact with the backend seamlessly using Axios.
            Technologies Used
            React: A powerful JavaScript library for building user interfaces.
            Axios: A robust HTTP client for making API requests.
            Redux: A reliable library for managing application state.
            Dive into this project to explore and enjoy a LinkedIn-like experience tailored just for you!
            
            #LinkedInClone #React #Axios #Redux #WebDevelopment #UserProfiles #PostCreation #DynamicFeed", 
            'recipe_id' => "3",
            'image_url' => "images/BW3-1.jpg",  
        ]);
        Post::create([
            'user_id' => 2,
            'content' => "🚀 Welcome to our Custom WordPress Theme for the Bahamas! 🌴

            Experience a captivating design inspired by the vibrant culture and natural beauty of the Bahamas. Customize your site effortlessly, share stunning multimedia, and help visitors plan their trip with integrated booking forms. Keep them engaged with updates on local events and attractions. Bring the Bahamas to life with our theme!
            
            #BahamasTheme #WordPress #Customization #Multimedia #TravelPlanning #LocalEvents 🏝️", 
            'recipe_id' => "4",
            'image_url' => "images/BW4-1.jpg",  
        ]);
        Post::create([
            'user_id' => 2,
            'content' => "🚀 Welcome to Our Online Library Management System! 📚

            Experience an efficient way to explore and manage the library's vast collection, designed for both users and administrators.
            
            For Standard Users:
            Registration and Login: Easily sign up and log in.
            Explore Collection: View the latest books and search by genre, author, or title.
            Book Details: Get detailed info, read reviews, and check availability.
            Book Reservation: Reserve books and manage reservations easily.
            Profile Management: Update your name, address, and contact details.
            For Administrators:
            Admin Dashboard: Overview of system activities and resource management.
            Manage Resources: Add, edit, and delete books, authors, and genres.
            User Management: Create accounts, modify permissions, and handle user reports.
            Enhance your library experience with our user-friendly and powerful system!
            
            #LibraryManagement #OnlineLibrary #BookReservation #UserFriendly #AdminDashboard #ProfileManagement", 
            'recipe_id' => "5",
            'image_url' => "images/BW5-5.jpg",  
        ]);
    }
}
