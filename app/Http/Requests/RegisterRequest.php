<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @OA\Schema(
 *      schema="RegisterRequest",
 *      properties={
 *          @OA\Property(
 *            property="name",
 *            type="string",
 *            example="example"
 *          ),
 *          @OA\Property(
 *            property="email",
 *            type="string",
 *            example="example@gmail.com"
 *          ),
 *          @OA\Property(
 *            property="password",
 *            type="string",
 *            example="123456"
 *          ),
 *      }
 * )
 */
class RegisterRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }
}
