<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralInformation;
use App\Models\Service;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Banner;
use App\Models\Post;
use App\Models\CaseStudy;
use App\Models\Vacancy;
use App\Models\Request as ContactRequests;
use App\Models\Application;
use App\Http\Resources\ServicesResource;
use App\Http\Resources\ClientsResource;
use App\Http\Resources\NewsResource;
use App\Http\Resources\BannersResource;
use App\Http\Resources\TeamResource;
use App\Http\Resources\AboutResource;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function general(Request $request)
    {
        $c = GeneralInformation::latest()->first();

        return response()->json([
            'header' => [
                'mini_logo' => Storage::disk('public')->url($c->small_logo),
                'instagram_link' => $c->instagram_link ?? '',
                'telegram_link' => $c->telegram_link ?? '',
                'facebook_link' => $c->facebook_link ?? '',
            ],
            'footer' => [
                'logo' => Storage::disk('public')->url($c->big_logo),
                'company_description_uz' => $c->footer_description_uz,
                'company_description_ru' => $c->footer_description_ru,
                'company_description_en' => $c->footer_description_en,
                'phone_number' => $c->phone_number,
                'address_ru' => $c->address_ru,
                'address_uz' => $c->address_uz,
                'address_en' => $c->address_en,
                'email' => $c->email,
            ]
        ],200);
    }

    public function home(Request $request)
    {
        $lang = $request->query('lang');

        $texts = [];

        switch ($lang) {
            case 'en':
                $texts['services_title'] = 'SERVICES';
                $texts['about_title'] = 'ABOUT COMPANY';
                $texts['clients_title'] = 'CLIENTS';
                $texts['news_title'] = 'NEWS';
                break;
            case 'uz':
                $texts['services_title'] = 'XIZMATLAR';
                $texts['about_title'] = 'KOMPANIYA HAQIDA';
                $texts['clients_title'] = 'MIJOZLAR';
                $texts['news_title'] = 'YANGILIKLAR';
                break;
            case 'ru':
                $texts['services_title'] = 'УСЛУГИ';
                $texts['about_title'] = 'О КОМПАНИИ';
                $texts['clients_title'] = 'КЛИЕНТЫ';
                $texts['news_title'] = 'НОВОСТИ';
                break;
            default:
                $texts['services_title'] = 'SERVICES';
                $texts['about_title'] = 'ABOUT COMPANY';
                $texts['clients_title'] = 'CLIENTS';
                $texts['news_title'] = 'NEWS';
                break;
        }

        $aboutText = 'company_description_'.$lang;
        $companyShortDescription = 'company_description_'.$lang;
        $address = 'company_address_'.$lang;

        $services = Service::all();

        $clients = Client::all();

        $posts = Post::all();

        $banners = Banner::all();

        $c = GeneralInformation::latest()->first();

        return response()->json([
            'language' => $lang,
            'banners' => BannersResource::collection($banners),
            'services' => [
                'main_title' => $texts['services_title'],
                'data' => ServicesResource::collection($services),
            ],
            'about_company' => [
                'title' => $texts['about_title'],
                'text_ru' => $c->about_text_ru,
                'text_uz' => $c->about_text_uz,
                'text_en' => $c->about_text_en,
            ],
            'clients' => [
                'title' => $texts['clients_title'],
                'data' => ClientsResource::collection($clients),
            ],
            'news' => [
                'title' => $texts['news_title'],
                'data' => NewsResource::collection($posts),

            ],

        ],200);
    }

    public function services()
    {
        $services = Service::all();

        return response()->json([
            'services' => ServicesResource::collection($services),
        ], 200);
    }

    public function team()
    {
        $employee = Employee::all();

        return response()->json([
            'employees' => TeamResource::collection($employee),
        ], 200);
    }

    public function about()
    {
        $cases = CaseStudy::all();

        return response()->json([
            'case-studies' => AboutResource::collection($cases),
        ], 200);
    }

    public function careers()
    {
        $vacansies = Vacancy::all();

        return response()->json([
            'vacancies' => $vacansies,
        ], 200);
    }

    public function storeContactRequests(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'message' => 'required'
        ]);

        $request = new ContactRequests();
        $request->fullname = $validatedData['fullname'];
        $request->email = $validatedData['email'];
        $request->phone_number = $validatedData['phone_number'];
        $request->message = $validatedData['message'];

        $model->save();

        return response()->json(['message' => 'Client request created successfully'], 201);
    }

    public function news()
    {
        $posts = Post::all();

        return response()->json([
            'news' => NewsResource::collection($posts),
        ], 200);
    }

    public function applyToJob(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'file' => 'required|file|max:10240',
        ]);

        if ($request->hasFile('file')) {

            $uploadedFile = $request->file('file');

            $filePath = $uploadedFile->store('public');

            $application = new Application();
            $application->fullname = $validatedData['fullname'];
            $application->phone_number = $validatedData['phone_number'];
            $application->file = $filePath;

            $application->save();

            return response()->json(['message' => 'Application submitted successfully'], 201);
        } else {
            return response()->json(['error' => 'File upload is required'], 400);
        }
    }
}
