<?php

 namespace App\Http\Controllers;

 use Illuminate\Support\Facades\Http;
 use Illuminate\Http\Request;

 class FeedBackController extends Controller
 {
     public function store(Request $request)
     {
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|max:255',
             'message' => 'required|string',
         ]);

         $response = Http::post('https://hook.us2.make.com/a78kcvffezji94gsmn6xx4fc3h81dkns', [
             'name' => $validated['name'],
             'email' => $validated['email'],
             'message' => $validated['message'],
         ]);

         return response()->json([
             'message' => $response->successful()
                 ? 'Thank you for your feedback!'
                 : 'Failed to submit feedback',
             'success' => $response->successful()
         ], $response->status());
     }
 }
