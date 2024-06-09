<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recipe::create([
            'user_id' => 2,  
            'title' => "Benchmark Simulator",
            'description' => "🌟 Explore IT-Themed Questions 🌟
            Dive into an extensive database filled with questions on various IT topics! From programming to cybersecurity, networking to the history of computing, there's something for everyone. Challenge yourself with a variety of stimulating and educational questions.
            
            📊 Get Your Performance Evaluated 📊
            After completing the quiz, you'll receive a score expressed as a percentage, reflecting your performance. This helps you understand your current knowledge level and pinpoint areas for improvement.",
            'instructions' => "Users can select the number of questions and the desired level of complexity for their quiz. This flexibility allows for a tailored experience for each user, whether they are beginners or experts.

            IT-Themed Questions: Our database offers a wide range of questions covering various aspects of IT, from programming to cybersecurity, from networking to the history of computing. Users will have access to a variety of stimulating topics.
            
            Quiz Evaluation in Percentage: At the end of the quiz, users will receive a score expressed as a percentage, reflecting their performance. This allows them to assess their level of knowledge and identify areas where they can improve.", 
            'image_url' => "images/BW1-1.jpg" 
        ]);
        Recipe::create([
            'user_id' => 2,  
            'title' => "Spotify Clone (Front-End)",
            'description' => "",
            'instructions' => "Intuitive Navigation: The user interface offers intuitive navigation, allowing users to easily explore various sections of the application, such as new releases, popular playlists, and more.

            Advanced Search: Users can utilize the search bar to look for artists, tracks, or albums of interest. The search is fast and accurate, providing relevant results in real-time.
            
            Favorite Saving: Users can save their favorite songs and artists for easy access later. This feature allows users to create a personalized music library that reflects their tastes and preferences.
            
            Audio Preview Playback: Using the StriveSchool API, users can listen to 30-second audio previews of music tracks. This feature gives them a taste of the available music, helping them discover new songs and artists.", 
            'image_url' => "images/BW2-1.jpg"
        ]);
        Recipe::create([
            'user_id' => 2,  
            'title' => "LinkedIn Clone - (Front-End)",
            'description' => "I'm thrilled to present a simplified clone of the LinkedIn user interface, developed with React, Axios, and Redux. This application leverages API calls to retrieve and display data, offering a LinkedIn-like experience for browsing user profiles and posting updates.",
            'instructions' => "Key Features
            👤 User Profile Viewing: View detailed profiles of other users.
            ✏️ Post Creation: Create and share your own posts.
            📜 Post Feed: Enjoy a dynamic feed that displays posts from various users.
            🔄 State Management with Redux: Experience efficient state management across the application.
            🌐 API Calls with Axios: Fetch data and interact with the backend seamlessly using Axios.
            Technologies Used
            React: A powerful JavaScript library for building user interfaces.
            Axios: A robust HTTP client for making API requests.
            Redux: A reliable library for managing application state.", 
            'image_url' => "images/BW3-1.jpg"
        ]);
        Recipe::create([
            'user_id' => 2,  
            'title' => "Custom Wordpress Theme",
            'description' => "Discover a unique and immersive experience with our specially designed theme, perfect for websites showcasing the stunning beauty and attractions of the Bahamas.",
            'instructions' => "Key Features:
            🌟 Exclusive Design:
            Our theme boasts an exclusive and captivating design inspired by the vibrant culture and natural beauty of the Bahamas. With vibrant colors, breathtaking images, and an intuitive layout, it captures visitors' attention and immerses them in the island atmosphere.
            
            🛠️ Flexible Customization:
            Highly customizable, the theme allows you to tailor it to your needs and preferences. From logo and color options to page layouts and typography, you have full control over your site's appearance and style.
            
            📸 Multimedia Gallery:
            Easily share stunning photos and videos of the Bahamas with the integrated multimedia gallery. Showcase sandy beaches, spectacular sunsets, rich marine life, and other breathtaking attractions to inspire visitors to explore the Bahamas.
            
            🗓️ Bookings and Travel Plans:
            Seamlessly integrate booking and travel planning forms to help visitors plan their trip to the Bahamas directly from your site. Offer personalized vacation packages, hotel reservations, guided tours, and more.
            
            🎉 Local Events and Attractions:
            Keep your visitors updated on local events, festivals, art exhibitions, concerts, and other attractions in the Bahamas. Use interactive event calendars and information cards to provide details and promote unique experiences in the archipelago.
            
            Bring the Bahamas to life with our Custom WordPress Theme, and create a stunning online presence that captivates and inspires!", 
            'image_url' => "images/BW4-1.jpg"
        ]);
        Recipe::create([
            'user_id' => 2,  
            'title' => "Librarium",
            'description' => "Experience a comprehensive and efficient way to explore and manage the vast collection of library books, designed for both standard users and administrators.",
            'instructions' => "Features for Standard Users:
                Registration and Login:
                
                Easily register and log in to access a range of personalized features.
                Collection Exploration:
                
                View the latest additions to the library.
                Browse available books using various search and filter options such as genre, author, and title.
                Book Details:
                
                Access detailed information about books, including descriptions, covers, and availability.
                Write and edit reviews for the books.
                Book Reservation:
                
                Reserve available books and manage your reservations through an intuitive, user-friendly interface.
                Profile Management:
                
                Update your profile information, including name, address, and contact details.
                Features for Administrators:
                Administration Dashboard:
                
                Access a dedicated dashboard that provides a comprehensive overview of system activities.
                Manage users, books, authors, genres, reviews, and reservations.
                Resource Management:
                
                Add, edit, and delete books, authors, and genres in the library collection.
                User Control:
                
                Manage user accounts, including creating new accounts, modifying permissions, and handling reports of inappropriate behavior.", 
            'image_url' => "images/BW5-5.jpg"
        ]);

        
    }
}
