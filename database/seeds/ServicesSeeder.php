<?php

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$services = ['Plumbing','Painting','Carpenting','Electrician'];

    	foreach($services as $service)
    	{
    		Service::create([
    			'name' => $service
    		]);
    	}
    }
}
