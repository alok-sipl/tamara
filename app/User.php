<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'short_code_id', 'phone_number', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Overrides the method to ignore the remember token.
     */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
            parent::setAttribute($key, $value);
        }
    }

    /*
     * Name: validationRulesForRegisterUser
     * Created By: P-SIPL
     * Created Date: 23-Nov-2017
     * Purpose: Validation rules for the registration
     */

    public static function validationRulesForUser($id = 0) {
        if($id){
            $response = [
                'name' => 'required|max:' . config('app.length.name'). '|regex:' . config('app.validation_patterns.name'),
                'code' => 'required|max:' . config('app.length.short_code'),
                'phone_number' => 'min:' . config('app.length.phone_number_min') . '|max:' . config('app.length.phone_number_max') . '|regex:' . config('app.validation_patterns.phone_number'),
                'user_type' => 'required'
            ];
        }else{
            $response = [
                'name' => 'required|max:' . config('app.length.name'). '|regex:' . config('app.validation_patterns.name'),
                'code' => 'required|max:' . config('app.length.short_code'),
                'email' => 'required|email|unique:users',
                'phone_number' => 'min:' . config('app.length.phone_number_min') . '|max:' . config('app.length.phone_number_max') . '|regex:' . config('app.validation_patterns.phone_number'),
                'user_type' => 'required'
            ];
        }
        return $response;
    }


    /*
     * Name: $validationMessages
     * Created By: AB-SIPL
     * Created Date: 27-April-2018
     * Purpose: All validation message display from here
     */

    public static $validationMessages = [
        'code.required' => 'Please enter short code',
        'code.max' => 'Short code can not be max 45 characters long',
        'name.required' => 'Please enter first name',
        'name.max' => 'First name can not be max 45 characters long',
        'first_name.regex' => 'First name is invalid',
        'phone_number.required' => 'Please enter contact number',
        'phone_number.min' => 'The contact number can be minimum 7 digits long',
        'phone_number.max' => 'The contact number can be max 18 digits long',
        'phone_number.regex' => 'Invalid contact number.',
        'email.required' => 'Please enter email address',
        'email.email' => 'Email address is invalid',
        'email.unique' => 'This email address already exist',
        'user_type.required' => 'Please enter email address',
    ];
}
