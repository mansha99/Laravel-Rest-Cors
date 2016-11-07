<?php
use App\Http\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    public function run() {
        ContactSeeder::run();
    }

}

class ContactSeeder {

    public static function run() {
        for ($i = 1; $i <= 23; $i++) {            
            Contact::create(["name" => "tom$i", "email" => "tom$i@gmail.com"]);
        }
    }

}
