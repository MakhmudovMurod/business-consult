<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Service;
use App\Models\Client;
use App\Models\Post;
use App\Http\Resources\ServicesResource;
use App\Http\Resources\ClientsResource;
use App\Http\Resources\NewsResource;

class MainController extends Controller
{
    public function index(Request $request)
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

        $c = Information::findOrFail(1);

        $aboutText = 'company_description_'.$lang;
        $companyShortDescription = 'company_description_'.$lang;
        $address = 'company_address_'.$lang;

        $services = Service::all();

        $clients = Client::all();

        $posts = Post::all();

        return response()->json([
            'language' => $lang,
            'social_links' => [
                'telegram' => $c->telegram_link,
                'instagram' => $c->instagram_link,
                'facebook' => $c->facebook_link,
            ],
            'slider' => [

            ],
            'services' => [
                'main_title' => $texts['services_title'],
                'data' => ServicesResource::collection($services),
            ],
            'about_company' => [
                'title' => $texts['about_title'],
                'description' => $c->$aboutText,
            ],
            'clients' => [
                'title' => $texts['clients_title'],
                'data' => ClientsResource::collection($clients),
            ],
            'news' => [
                'title' => $texts['news_title'],
                'data' => NewsResource::collection($posts),

            ],
            'footer' => [
                'short_company_description' => $c->$companyShortDescription,
                'company_phone_number' => $c->company_phone,
                'company_address' => $c->$address,
            ]

        ],200);
    }
}
