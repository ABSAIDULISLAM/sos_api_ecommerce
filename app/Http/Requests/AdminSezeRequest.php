<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSezeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            ''
        ];
    }

    public function customRules()
    {
        $rules = [
            'bulk_qty' => 'required',
            'bulk' => 'required|in:bulk,retailer,both',
        ];

        if ($this->input('category') === 'both' || $this->input('category') === 'retailer') {
            $rules['retail_price'] = 'required|numeric|min:0';
        }

        if ($this->input('category') === 'both' || $this->input('category') === 'bulk') {
            $rules['bulk_qty'] = 'required|integer|min:0';
            $rules['bulk_price'] = 'required|numeric|min:0';
        }

        return $rules;
    }

}
