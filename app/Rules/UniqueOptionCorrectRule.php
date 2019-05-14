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
        return !Option::where($attribute, $value)->where('question_id', $this->question)->first();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
