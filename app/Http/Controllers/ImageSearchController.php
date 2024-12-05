<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use InferenceHTTPClient;

class ImageSearchController extends Controller
{
    public function image_search(Request $request)
    {
        // Validasi input file
        $request->validate([
            'image_for_search' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan gambar sementara
        $image = $request->file('image_for_search');
        $imagePath = $image->store('temp', 'public');

        // Inference dengan model ML
        $client = new InferenceHTTPClient([
            'api_url' => 'https://detect.roboflow.com',
            'api_key' => 'mPwxwtAPAt2YuUGe8mwR',
        ]);

        $result = $client->infer(
            public_path('storage/' . $imagePath),
            model_id: 'detection-of-laptop-and-phone/1'
        );

        // Proses hasil deteksi
        $prediction = $result['predictions'][0]['class'] ?? null;

        // Arahkan sesuai hasil deteksi
        if ($prediction === 'laptop') {
            return redirect('/g/laptop/1');
        } elseif ($prediction === 'mobile') {
            return redirect('/g/mobile/1');
        } else {
            return back()->with('error', 'Gambar tidak termasuk ke dalam kategori yang ada.');
        }
    }
}