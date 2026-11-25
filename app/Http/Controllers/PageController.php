<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadImageService;
use App\Services\EmailService;
use App\Services\SubProductService;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\Enquiry;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    private $imageService, $emailService, $subProductService;

    public function __construct (
        UploadImageService $imageService,
        EmailService $emailService,
        SubProductService $subProductService
    )
    {
        $this->imageService = $imageService;
        $this->emailService = $emailService;
        $this->subProductService = $subProductService;
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
    public function retailLoans(Request $request)
    {
        return view('retail-loans');
    }
    public function businessLoans(Request $request)
    {
        return view('business-loans');
    }
    public function startupLoans(Request $request)
    {
        return view('startup-loans');
    }
    public function corporateLoans(Request $request)
    {
        return view('corporate-loans');
    }
    public function securedLoans(Request $request)
    {
        return view('secured-loans');
    }
    public function unsecuredLoans(Request $request)
    {
        return view('unsecured-loans');
    }
    public function industries(Request $request)
    {
        return view('industries');
    }
    public function howWeWork(Request $request)
    {
        return view('how-we-work');
    }
    public function partnerWithUs(Request $request)
    {
        return view('partner-with-us');
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
    public function enquiry(Request $request)
    {
        $sub_products = $this->subProductService->getActiveSubProducts();
        return view('enquiry')->with('sub_products', $sub_products);
    }
    public function saveEnquiry(Request $request)
    {
        $enquiry = new Enquiry;
        $enquiry->full_name = $request->full_name;
        $enquiry->mobile = $request->mobile;
        $enquiry->email = $request->email;
        $enquiry->applicant_type = $request->applicant_type;
        $enquiry->loan_category = $request->loan_category;
        $enquiry->loan_product = $request->loan_product;
        $enquiry->loan_amount = $request->loan_amount;
        $enquiry->city_state = $request->city_state;
        $enquiry->requirement = $request->requirement;
        $enquiry->save();
        $admin_email = env('ADMIN_EMAIL');
        $subject = 'New Enquiry Submission';
        $result = [
            'full_name' => $request->full_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'applicant_type' => $request->applicant_type,
            'loan_category' => $request->loan_category,
            'loan_product' => $request->loan_product,
            'loan_amount' => $request->loan_amount,
            'city_state' => $request->city_state,
            'requirement' => $request->requirement,
        ];
        $this->emailService->sendEmail('emails.enquiry', $result, $admin_email, $subject);
        $request->session()->put('message', 'Thank you for contacting Shritik Global India Private Limited. Your enquiry has been received. Our team will review the details and contact you through the information provided. Submission does not guarantee loan eligibility, approval or disbursement.');
        $request->session()->put('alert-type', 'alert-success');
        return redirect()->back();
    }
    public function privacy(Request $request)
    {
        return view('privacy-policy');
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
