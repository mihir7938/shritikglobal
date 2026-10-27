<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadImageService;
use App\Services\EmailService;
use App\Models\Customer;
use App\Models\Contact;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    private $imageService, $emailService;

    public function __construct (
        UploadImageService $imageService,
        EmailService $emailService
    )
    {
        $this->imageService = $imageService;
        $this->emailService = $emailService;
    }

    public function index(Request $request)
    {
        return view('index');
    }
    public function about(Request $request)
    {
        return view('about');
    }
    public function services(Request $request)
    {
        return view('services');
    }
    public function projects(Request $request)
    {
        return view('projects');
    }
    public function features(Request $request)
    {
        return view('features');
    }
    public function team(Request $request)
    {
        return view('team');
    }
    public function testimonial(Request $request)
    {
        return view('testimonial');
    }
    public function contact(Request $request)
    {
        return view('contact');
    }
    public function saveContact(Request $request)
    {
        $contact = new Contact;
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        $admin_email = env('ADMIN_EMAIL');
        $subject = 'New Contact Submission';
        $result = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        $this->emailService->sendEmail('emails.contact', $result, $admin_email, $subject);
        $request->session()->put('message', 'Thank you for your message. It has been sent.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->back();
    }
    public function partners(Request $request)
    {
        return view('partners');
    }
    public function documents(Request $request)
    {
        return view('documents');
    }
    public function checkMobile(Request $request)
    {
        $exists = Customer::where('mobile', $request->mobile)->exists();
        return response()->json(!$exists);
    }
}
