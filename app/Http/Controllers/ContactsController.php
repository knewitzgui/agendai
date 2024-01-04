<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\Contact;
use Illuminate\Support\Facades\Response;

class ContactsController extends Controller
{
    public function newsletter(Request $request){
        if($request->isMethod('get')){
            $newsletter = Newsletter::all();
            return view('admin.pages.configurations.newsletter', compact('newsletter'));
        }
    }

    public function newsletterExport(Request $request){
        $data = Newsletter::select('name', 'email')->get()->toArray();

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=newsletter.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $callback = function() use ($data) {
            $file = fopen('php://output', 'w');
            fputcsv($file, array('Name', 'Email'));

            foreach ($data as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function contact(Request $request){
        if($request->isMethod('get')){
            $contacts = Contact::all();
            return view('admin.pages.configurations.contact', compact('contacts'));
        }
    }

    public function contactExport(Request $request){
        $data = Contact::select('name', 'email', 'phone', 'subject', 'message')->get()->toArray();

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=contact.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $callback = function() use ($data) {
            $file = fopen('php://output', 'w');
            fputcsv($file, array('Nome', 'Email', 'Telefone', 'Assunto', 'Mensagem'));

            foreach ($data as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
