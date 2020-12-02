<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UploadFileController extends Controller
{
    public function main(Request $request)
    {
        try {
            $files = $request->except(['_token']);
            $validate = $this->validateData($files);
            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate->errors())->withInput();
            }
            if (isset($files['copy_of_id'])) {
                $files['copy_of_id'] = $this->uploadFile($files['copy_of_id']);
            }
            if (isset($files['proof_of_address'])) {
                $files['proof_of_address'] = $this->uploadFile($files['proof_of_address']);
            }
            if (isset($files['addtional_file'])) {
                $files['addtional_file'] = $this->uploadFile($files['addtional_file']);
            }
            unset($files['copy_of_id_value']);
            $uploaded = User::where('id', Auth::user()->id)->update($files);
            if ($uploaded) {
                return redirect()->back()->with('success', 'You updated your image successfully');
            } else {
                return redirect()->back()->with('error', 'You updated your image fail');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function validateData($data)
    {
        return Validator::make(
            $data,
            [
                'copy_of_id_value' => 'required',
                'copy_of_id' => 'bail|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'addtional_file' => 'bail|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'proof_of_address' => 'bail|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );
    }

    private function uploadFile($file)
    {
        $name = time() . '.' . $file->getClientOriginalName();
        Storage::disk('public')->put($name, file_get_contents($file));
        return  Storage::disk('public')->url($name);
    }
}
