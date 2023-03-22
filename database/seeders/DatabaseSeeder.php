<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(ServiceInfosTableSeeder::class);
        $this->call(WebsiteInfosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(AboutUsesTableSeeder::class);
        $this->call(BlogInfosTableSeeder::class);
        $this->call(ContactUsesTableSeeder::class);
        $this->call(FaqsTableSeeder::class);
        $this->call(OfferInfosTableSeeder::class);
        $this->call(PartnerInfosTableSeeder::class);
        $this->call(PhotoGalleriesTableSeeder::class);
        $this->call(ShopInfosTableSeeder::class);
    }
}
