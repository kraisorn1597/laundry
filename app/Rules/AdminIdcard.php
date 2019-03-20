<?php

namespace App\Rules;

use App\Admin;
use Illuminate\Contracts\Validation\Rule;

class AdminIdcard implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->id = $id;
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
        $admin_id = $this->id;
        $id_card = str_replace(" ", "", $value);
        $query = Admin::query()
            ->where('id','!=',$admin_id)
            ->where('id_card',$id_card)
            ->first();

        if ($query)
        {
            return false;
        }
        else
        {
            return true;
        }
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
