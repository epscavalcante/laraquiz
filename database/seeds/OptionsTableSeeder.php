<?php

use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Option::class, 30)->create();

        // $questions = Question::wherehas('options')->with('options')->get();

        // foreach($questions as $question)
        // {
        //     Option::where('question_id', $question->id)->where('is_correct', 0)->get();

        //     $optionCorrect  = rand($question->options->first(), $question->options->last());

            
        //     $options = $question->options;

        // }
    }
}
