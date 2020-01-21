<?php

use App\Loan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('loans');

        $loan = new Loan;
        $loan->title = $title = 'Lorem, ipsum dolor sit amet consectetur adipisicing etur adipisicing elit. Odit expedita';
        $loan->slug = Str::slug($title);
        $loan->excerpt = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident perspiciatis, aut itaque eveniet harum ducimus iure magnam voluptates iste cum quisquam. Sed voluptates quaerat, ea provident aut unde odio dolore!';
        $loan->user_id = 1;
        $loan->category_id = 1;
        //$loan->published_at = Carbon::now()->subDays(4);
        $loan->save();

        $loan->tags()->sync([1, 2]);
        // $loan->documents()->sync([1,2]);

        $loan = new Loan;
        $loan->title = $title = 'Lorem, ipsum dolor sit amet cisicing lit. Provident';
        $loan->slug = Str::slug($title);
        $loan->excerpt = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit expedita at fugiat incidunt dicta labore doloremque, adipisci autem rerum. Eveniet ducimus quisquam molestias sunt corrupti. Molestias tenetur molestiae nemo tempora?';
        $loan->user_id = 2;
        $loan->category_id = 2;
       // $loan->published_at = Carbon::now()->subDays(3);
        $loan->save();

        $loan->tags()->sync([3, 4]);
        //  $loan->documents()->sync([3,4]);


        $loan = new Loan;
        $loan->title = $title = 'Lorem, ipsum doloretur adipisicing elit. rovident consectetur adipisicing elit. Odit expedita';
        $loan->slug = Str::slug($title);
        $loan->excerpt = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident perspiciatis, aut itaque eveniet harum ducimus iure magnam voluptates iste cum quisquam. Sed voluptates quaerat, ea provident aut unde odio dolore!';
        $loan->user_id = 1;
        $loan->category_id = 1;
        //$loan->published_at = Carbon::now()->subDays(4);
        $loan->save();

        $loan->tags()->sync([1, 2]);


        $loan = new Loan;
        $loan->title = $title = 'Lorem, ipsum dolot. rovident consectetur adipisicing elit. Odit expedita';
        $loan->slug = Str::slug($title);
        $loan->excerpt = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident perspiciatis, aut itaque eveniet harum ducimus iure magnam voluptates iste cum quisquam. Sed voluptates quaerat, ea provident aut unde odio dolore!';
        $loan->user_id = 1;
        $loan->category_id = 2;
        //$loan->published_at = Carbon::now()->subDays(4);
        $loan->save();

        $loan->tags()->sync([1, 2]);

    }
}
