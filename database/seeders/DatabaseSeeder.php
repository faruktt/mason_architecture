<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Career;
use App\Models\News;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin BIG',
            'email' => 'admin@big.dk',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Sample Projects
        $projects = [
            ['title' => 'CopenHill', 'slug' => 'copenhill', 'location' => 'Copenhagen', 'country' => 'Denmark', 'category' => 'Architecture', 'description' => 'The cleanest waste-to-energy power plant in the world with a ski slope on its roof.', 'year' => 2019, 'featured' => true],
            ['title' => 'Google Bay View', 'slug' => 'google-bay-view', 'location' => 'Mountain View', 'country' => 'United States', 'category' => 'Architecture', 'description' => 'A net-zero carbon campus featuring dragonscale solar panels and geothermal systems.', 'year' => 2022, 'featured' => true],
            ['title' => '8 House', 'slug' => '8-house', 'location' => 'Copenhagen', 'country' => 'Denmark', 'category' => 'Architecture', 'description' => 'A figure-eight loop residential building that redefines urban living.', 'year' => 2010, 'featured' => true],
            ['title' => 'VIA 57 West', 'slug' => 'via-57-west', 'location' => 'New York', 'country' => 'United States', 'category' => 'Architecture', 'description' => 'A hybrid courtyard-skyscraper typology in Manhattan.', 'year' => 2016, 'featured' => false],
            ['title' => 'Superkilen', 'slug' => 'superkilen', 'location' => 'Copenhagen', 'country' => 'Denmark', 'category' => 'Landscape', 'description' => 'A radical public square celebrating diversity in an urban neighborhood.', 'year' => 2012, 'featured' => false],
            ['title' => 'The Twist', 'slug' => 'the-twist', 'location' => 'Jevnaker', 'country' => 'Norway', 'category' => 'Architecture', 'description' => 'A museum that doubles as a bridge, twisting 90 degrees from one side to another.', 'year' => 2019, 'featured' => true],
            ['title' => 'BiodiverCity Penang', 'slug' => 'biodivercity-penang', 'location' => 'Penang', 'country' => 'Malaysia', 'category' => 'Planning', 'description' => 'A sustainable island masterplan celebrating biodiversity and local culture.', 'year' => 2022, 'featured' => false],
            ['title' => 'Gelephu Mindfulness City', 'slug' => 'gelephu-mindfulness-city', 'location' => 'Gelephu', 'country' => 'Bhutan', 'category' => 'Planning', 'description' => 'A 2,500 km² masterplan for a carbon-negative city guided by Gross National Happiness.', 'year' => 2024, 'featured' => true],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        // Sample Team Members
        $team = [
            ['name' => 'Bjarke Ingels', 'role' => 'Partner', 'title' => 'Founder & Creative Director', 'office' => 'Copenhagen', 'bio' => 'Bjarke Ingels is the founder of BIG. His work is driven by the belief that architecture can be a tool for turning fiction into fact.', 'is_partner' => true, 'sort_order' => 1],
            ['name' => 'Sheela Maini Søgaard', 'role' => 'Partner', 'title' => 'CEO, Partner', 'office' => 'Copenhagen', 'bio' => 'Sheela manages the health and growth of BIG\'s studio offices globally with 800+ designers and staff.', 'is_partner' => true, 'sort_order' => 2],
            ['name' => 'David Zahle', 'role' => 'Partner', 'title' => 'Partner', 'office' => 'Copenhagen', 'bio' => 'David Zahle is a Partner at BIG and has been Project and Design Architect for many award-winning projects.', 'is_partner' => true, 'sort_order' => 3],
            ['name' => 'Brian Yang', 'role' => 'Partner', 'title' => 'Partner', 'office' => 'Copenhagen', 'bio' => 'Brian Yang joined BIG in 2007 and was named Partner in 2015. He brings focus on environmental sustainability.', 'is_partner' => true, 'sort_order' => 4],
            ['name' => 'Jakob Lange', 'role' => 'Partner', 'title' => 'Partner, Products', 'office' => 'Copenhagen', 'bio' => 'Jakob heads BIG Products, collaborating with industry-leading companies on furniture, lighting and IoT.', 'is_partner' => true, 'sort_order' => 5],
            ['name' => 'Daniel Sundlin', 'role' => 'Partner', 'title' => 'Partner', 'office' => 'New York', 'bio' => 'Daniel opened BIG\'s first office outside Denmark in New York in 2010.', 'is_partner' => true, 'sort_order' => 6],
        ];

        foreach ($team as $member) {
            TeamMember::create($member);
        }

        // Sample Careers
        $careers = [
            ['title' => 'Senior Architect', 'department' => 'Architects', 'location' => 'Copenhagen', 'type' => 'Full-time', 'description' => 'We are looking for a talented Senior Architect to join our Copenhagen studio.', 'status' => 'open'],
            ['title' => 'Landscape Architect', 'department' => 'Landscape', 'location' => 'New York', 'type' => 'Full-time', 'description' => 'Join BIG Landscape to integrate built and natural worlds.', 'status' => 'open'],
            ['title' => 'Business Development Manager', 'department' => 'Business Development', 'location' => 'New York', 'type' => 'Full-time', 'description' => 'Lead business development initiatives across North America.', 'status' => 'open'],
            ['title' => 'Junior Architect', 'department' => 'Architects', 'location' => 'London', 'type' => 'Full-time', 'description' => 'Exciting opportunity for a Junior Architect in our London studio.', 'status' => 'open'],
            ['title' => 'Design Technology Specialist', 'department' => 'Design Technology', 'location' => 'Barcelona', 'type' => 'Full-time', 'description' => 'Lead parametric and computational design at BIG Barcelona.', 'status' => 'open'],
        ];

        foreach ($careers as $career) {
            Career::create($career);
        }

        // Sample News
        $news = [
            ['title' => 'BIG Completes CopenHill in Copenhagen', 'slug' => 'big-completes-copenhill', 'excerpt' => 'The world\'s first ski slope on a waste-to-energy plant has opened to the public.', 'content' => 'CopenHill, BIG\'s iconic waste-to-energy plant with a ski slope on its roof, has officially opened to the public in Copenhagen. The building represents a new paradigm for sustainable infrastructure that doubles as a recreational landmark.', 'category' => 'Project', 'status' => 'published', 'published_at' => now()->subMonths(2)],
            ['title' => 'BIG Reveals Plans for Gelephu Mindfulness City', 'slug' => 'gelephu-mindfulness-city-revealed', 'excerpt' => 'A 2,500 km² masterplan for Bhutan guided by Gross National Happiness principles.', 'content' => 'BIG has unveiled plans for the Gelephu Mindfulness City in Bhutan — a carbon-negative city designed to be powered entirely by renewable energy and guided by the country\'s unique Gross National Happiness philosophy.', 'category' => 'News', 'status' => 'published', 'published_at' => now()->subMonth()],
            ['title' => 'BIG Opens New Los Angeles Office', 'slug' => 'big-opens-los-angeles-office', 'excerpt' => 'Bjarke Ingels Group expands its presence on the West Coast with a new studio.', 'content' => 'BIG has officially opened its Los Angeles office, led by Partner Leon Rost. The new studio is based in Santa Monica and will focus on projects across the Western United States and beyond.', 'category' => 'Announcement', 'status' => 'published', 'published_at' => now()->subWeeks(2)],
        ];

        foreach ($news as $item) {
            News::create($item);
        }

        // Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'BIG | Bjarke Ingels Group'],
            ['key' => 'site_tagline', 'value' => 'Architecture, Landscape, Engineering, Planning & Products'],
            ['key' => 'contact_email', 'value' => 'info@big.dk'],
            ['key' => 'phone_cph', 'value' => '+45 7221 7227'],
            ['key' => 'address_cph', 'value' => 'Sundkaj 165, 2150 Nordhavn, Copenhagen'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
