<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
        $carId = $this->route('car'); // جلب ID السيارة من الرابط إذا كان موجودًا
        return [
            
            'license_plate' => 'required|string|max:255|unique:cars,license_plate,' . ($carId ?? 'NULL') . ',id',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'make' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'price_per_hour' => 'required|numeric|min:0',
            'price_per_day' => 'required|numeric|min:0',
            'price_per_month' => 'required|numeric|min:0',
            'mileage' => 'required|integer|min:0',
            'transmission' => 'required|string',
            'seats' => 'required|integer|min:1',
            'luggage' => 'required|integer|min:0',
            'fuel' => 'required|string',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
