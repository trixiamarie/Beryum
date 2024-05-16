@php
$footerLinks = [
    "About Us",
    "Contact",
    "Recipes",
    "Cooking Tips",
    "Nutritional Information",
    "Food Blog",
    "Events",
    "Partnerships",
    "Terms of Service",
    "Privacy Policy",
    "Cookie Policy",
    "Community Guidelines",
];
@endphp

<div class="text-center"> 
    <ul class="mt-3 d-flex flex-wrap justify-content-around">
        @foreach ($footerLinks as $link)
            <li>
            <a href="#" class="text-gray-100 hover:text-purple-900">{{ $link }}</a>
            </li>
        @endforeach
    </ul>
    <div class="flex items-center justify-center">
        <p class="text-s m-0 text-orange-900">Beryum © 2024 di Trixia M. Lorenzana</p>
    </div>
</div>
