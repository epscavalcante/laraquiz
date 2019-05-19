<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Option;

class UniqueOptionCorrectRule implements Rule
{
    private $question;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($question)
    {
        $this->question = $question;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        // dd($attribute, $value, $this->question);

        if($value){
            
            $optionsCorrect = Option::where($attribute, 1)->where('question_id', $this->question)->get();
            
            if($optionsCorrect->count() === 0){
                return true;
            }
    
            return false;
    
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Option correct existing';
    }
}
