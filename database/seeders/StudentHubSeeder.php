<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\User;
use App\Models\Profile;
use App\Models\Interest;
use App\Models\NewsItem;
use App\Models\FaqCategory;
use App\Models\ContactMessage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentHubSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@ehb.be')->first();

        $student1 = User::create([
            'name' => 'Sara',
            'email' => 'sara@studenthub.be',
            'password' => Hash::make('Password!321'),
            'role' => 'user',
        ]);

        $student2 = User::create([
            'name' => 'Yassin',
            'email' => 'yassin@studenthub.be',
            'password' => Hash::make('Password!321'),
            'role' => 'user',
        ]);

        Profile::create([
            'user_id' => $student1->id,
            'study_program' => 'Graduaat Programmeren',
            'bio' => 'Ik ben geïnteresseerd in webdevelopment en databases.',
            'profile_photo' => null,
        ]);

        Profile::create([
            'user_id' => $student2->id,
            'study_program' => 'Backend Web',
            'bio' => 'Ik leer graag werken met Laravel en PHP.',
            'profile_photo' => null,
        ]);

        $interest1 = Interest::create([
            'name' => 'Laravel',
        ]);

        $interest2 = Interest::create([
            'name' => 'Databases',
        ]);

        $interest3 = Interest::create([
            'name' => 'Webdesign',
        ]);

        $student1->interests()->attach([$interest1->id, $interest2->id]);
        $student2->interests()->attach([$interest1->id, $interest3->id]);

        NewsItem::create([
            'user_id' => $admin->id,
            'title' => 'Welkom bij StudentHub',
            'content' => 'StudentHub is een platform waar studenten nieuws kunnen lezen, FAQ’s kunnen bekijken en hun profiel kunnen beheren.',
            'is_published' => true,
        ]);

        NewsItem::create([
            'user_id' => $admin->id,
            'title' => 'Nieuwe FAQ beschikbaar',
            'content' => 'Er zijn nieuwe veelgestelde vragen toegevoegd over accounts en profielen.',
            'is_published' => true,
        ]);

        $category1 = FaqCategory::create([
            'name' => 'Account',
            'description' => 'Vragen over registreren, inloggen en gebruikersaccounts.',
        ]);

        $category2 = FaqCategory::create([
            'name' => 'Profiel',
            'description' => 'Vragen over publieke profielen en profielfoto’s.',
        ]);

        Faq::create([
            'faq_category_id' => $category1->id,
            'question' => 'Hoe maak ik een account aan?',
            'answer' => 'Je kunt een account aanmaken via de registratiepagina.',
            'is_visible' => true,
        ]);

        Faq::create([
            'faq_category_id' => $category2->id,
            'question' => 'Kan ik mijn profiel aanpassen?',
            'answer' => 'Ja, een ingelogde gebruiker kan zijn eigen profiel aanpassen.',
            'is_visible' => true,
        ]);

        ContactMessage::create([
            'name' => 'Test Student',
            'email' => 'student@example.com',
            'subject' => 'Vraag over StudentHub',
            'message' => 'Dit is een testbericht voor de administrator.',
        ]);
    }
}