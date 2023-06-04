<?php
namespace App\Validators\Admin;

use App\Validators\Validator;

class CategoryValidator extends Validator
{
    /**
     * Rules for User registration
     *
     * @var array
     */
    protected $rules = [
        'category_name'=>'required',
        'description'       =>'required',
    ];


}
