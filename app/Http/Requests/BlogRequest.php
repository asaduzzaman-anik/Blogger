<?php

namespace App\Http\Requests;

use App\Models\Blog;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:10', 'max:255'],
            'description' => ['required', 'min:10'],
        ];
    }

    public function messages():array
    {
        return [
            'title.required' => 'Seriosuly? An empty title?',
            'title.min' => "It's a title, write a phrase at least you moron",
            'title.max' => "It's the title, not the description. Make it short.",
            'description.required' => 'Come on dude, you gotta write something for :attribute',
            'description.min' => 'Write in detail about your blog, psss',
        ];
    }
}
