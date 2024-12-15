<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\View\View;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

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
        $imageFullPath = public_path('storage/' . $imagePath);
        // URL dan API key Roboflow
        $apiUrl = "https://detect.roboflow.com/detection-of-laptop-and-phone/1";
        $apiKey = "mPwxwtAPAt2YuUGe8mwR";
        try {
            // Kirim gambar ke API menggunakan Guzzle
            $client = new Client();
            $response = $client->post("{$apiUrl}?api_key={$apiKey}", [
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => fopen($imageFullPath, 'r'),
                    ],
                ],
            ]);
            $body = json_decode($response->getBody(), true);
            $predictions = $body['predictions'] ?? [];
            $accuracy = $body['accuracy'] ?? null;
            // Ambil prediksi utama (confidence tertinggi)
            $detections = [];
            foreach ($predictions as $prediction) {
                $detections[] = [
                    'class' => $prediction['class'],
                    'confidence' => $prediction['confidence'],
                ];
            }
            $primaryPrediction = collect($detections)->sortByDesc('confidence')->first();
            $category = $primaryPrediction['class'] ?? null;
            if ($category) {
                $items = null;
                if ($category == 'laptop-phone') {
                    $items = Items::where('category', 'LIKE', 'Laptop')->get();
                }
                else if ($category == 'phone') {
                    $items = Items::where('category', 'LIKE', 'Mobile')->get();
                }
                if($items) {
                    foreach($items as $item) {
                        $files = Storage::disk('public')->files('items/'.$item->id);
                        $path = pathinfo($files[0]);
                        $item->thumbnail = 'items/'.$item->id.'/'.$path['basename'];
                    }
                }
                return view('imagesearchresult', [
                    'image_search_name' => $imagePath,
                    'category' => $category,
                    'accuracy' => $accuracy,
                    'detections' => $detections,
                    'items' => $items,
                ]);
            } else {
                // Tidak ada kategori yang terdeteksi
                return back()->with('error', 'Gambar tidak termasuk ke dalam kategori yang dapat dideteksi.');
            }
        } catch (\Exception $e) {
            // Tangani kesalahan saat request ke API
            return back()->with('error', 'Gagal memproses gambar: ' . $e->getMessage());
        }
    }
}
