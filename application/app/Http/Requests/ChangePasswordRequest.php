<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ChangePasswordRequest extends Request
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
   * Get the validation rules that apply to the request
   *
   * @return array
   *
  */
  public function rules()
  {
    return [
      'oldpass' => 'required',
      'newpass' => 'required|min:8|confirmed',
      'newpass_confirmation' => 'required'
    ];
  }

  public function message()
  {
    return[
      'oldpass.required' => 'Mohon isi password lama anda.',
      'newpass.required' => 'Mohon isi password baru anda.',
      'newpass.min' => 'Minimal 8 karakter.',
      'newpass.confirmed' => 'Mohon isi konfirmasi password baru anda dengan benar.',
      'newpass_confirmation.required' => 'Mohon isi konfirmasi password baru anda.',
    ];
  }
}
