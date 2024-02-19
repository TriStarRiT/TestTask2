<?php

namespace App\Http\Requests;

use App\Repositories\PostRepository;
use Illuminate\Foundation\Http\FormRequest;

class PostApiRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(PostRepository $postRepository): array
    {
        return [
            'limit' => 'numeric|nullable|min:1|max:' . $postRepository->count(),
            'page' => 'numeric|min:1|nullable',
        ];
    }
}
