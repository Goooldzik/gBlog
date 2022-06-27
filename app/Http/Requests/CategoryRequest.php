<?php

namespace App\Http\Requests;

use App\Dtos\CategorySaveDto;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255'
        ];
    }

    /**
     * @return  CategorySaveDto
     * @throws  UnknownProperties
     */
    public function data(): CategorySaveDto
    {
        return new CategorySaveDto([
            'title' => $this->input('title')
        ]);
    }
}
