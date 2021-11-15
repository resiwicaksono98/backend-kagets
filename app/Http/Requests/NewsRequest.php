<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Route $route)
    {
        return [
            'title' => ['required'],
            // 'picture_path' => 'required|image|mimes:jpg,jpeg,png',
            'picture_path' => ['image','mimes:jpg,jpeg,png',Rule::requiredIf($route->getActionName() == "App\Http\Controllers\Kagets\NewsController@store")],
            'description' => ['required'],
            'rate' => ['required'],
        ];
    }
}
