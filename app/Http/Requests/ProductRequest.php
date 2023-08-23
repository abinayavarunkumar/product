<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return
        [
			'product_name' => 'required',
			'unit_type_id' => 'required',
			'product_category' => 'required',
			'product_images' => 'required',
			'product_price' => 'required',
			'discount_percentage' => 'required',
			'discount_amount' => 'required',
			'discount_start_date' => 'required',
            'discount_end_date' => 'required',
			'tax_percentage' => 'required',
			'tax_amount' => 'required',
			'stock_entry' => 'required',
        ];
    }
}
