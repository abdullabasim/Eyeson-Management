<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client as clientModel;
use App\Models\Department as departmentModel;
use App\Models\Service as serviceModel;
use App\Models\Invoice as invoiceModel;
use App\Models\Session as sessionModel;
use App\Http\Requests\Eyeson\Client\ClientAdd as clientAddRequest;
use App\Http\Requests\Eyeson\Client\ClientEdit as ClientEditRequest;
use App\Http\Requests\Eyeson\Service\ServiceAdd as serviceAddRequest;
use App\Http\Requests\Eyeson\Service\ServiceManageStep2 as serviceManageStep2Request;
use App\Http\Requests\Eyeson\Service\ServiceEdit as serviceEditRequest;
use App\Http\Requests\Eyeson\Session\AnalysisSearch as analysisSearchRequest;
use App\Http\Requests\Eyeson\Session\SessionAdd as sessionAddRequest;
use App\Http\Requests\Eyeson\Session\SessionEdit as sessionEditRequest;
use Carbon\Carbon;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function clientAddPage()
    {
        return view('eyeson.client.add_client');
    }

    public function clientAdd(clientAddRequest $request)
    {
        try {
            clientModel::create([
                'name' => $request->name,
                'address'=>$request->address,
                'mobile'=>$request->mobile,
                'email'=>$request->email
            ]);

            return back()
                ->with('success', 'تم أضافة معلومات الزبون  بنجاح');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()
                ->with('error', 'يوجد خطأ لو يتم الاضافة يرجى المحاولة مرة أخرى!');
        }
    }

    public function clientManage()
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);
        $clients = clientModel::orderBy('id', 'desc')
                               ->get();

        return view('eyeson.client.manage_client', [
            'clients' => $clients
        ]);
    }

    public function clientEdit($id, ClientEditRequest $request)
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);

        try {
            $client = clientModel::findOrFail($id);

            clientModel::where('id', $client->id)
                ->update([
                    'name' => $request->name,
                    'address'=>$request->address,
                    'mobile'=>$request->mobile,
                    'email'=>$request->email
                ]);

            return back()
                ->with('success', 'تم تحديث معلومات الزبون بنجاح');
        } catch (\Exception $e) {


            return back()
                ->with('error', 'لم يتم تحديث المعلومات يرجى المحاولة مرة أخرى ');
        }
    }

    public function clientDelete($id)
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);

        try {
            $client = clientModel::findOrFail($id);


            clientModel::destroy($client->id);

            return back()
                ->with('success', 'تم حذف معلومات الزبون  بنجاح');
        } catch (\Exception $e) {


            return back()
                ->with('error', 'لم يتم حذف معلومات الزبون يرجى المحاولة مرة أخرى ');
        }
    }

    public function serviceAddPage()
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);
        $departments = departmentModel::get();


        return view('eyeson.service.add_service',
            [
                'departments'=>$departments
            ]);
    }

    public function serviceAdd(serviceAddRequest $request)
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);

        try {
            serviceModel::create([
                'department_id' => $request->department,
                'title'=>$request->service,
                'price'=>$request->price

            ]);

            return back()
                ->with('success', 'تم أضافة الخدمة  بنجاح');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()
                ->with('error', 'يوجد خطأ لو يتم الاضافة يرجى المحاولة مرة أخرى!');
        }
    }

    public function serviceManageStep1()
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);
        $departments =departmentModel::orderBy('id', 'desc')
                                       ->get();

        return view('eyeson.service.manage_service_step1', [
            'departments' => $departments
        ]);
    }

    public function serviceManageStep2(serviceManageStep2Request $request)
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);
        $services =serviceModel::where('department_id',$request->department)
                                    ->orderBy('id', 'desc')
                                    ->get();

        return view('eyeson.service.manage_service_step2', [
            'services' => $services
        ]);
    }

    public function serviceEdit(serviceEditRequest $request)
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);
        try {
            $service = serviceModel::findOrFail($request->serviceId);


            serviceModel::where('id', $service->id)
                ->update([
                    'title'=>$request->title,
                    'price'=>$request->price
                ]);

            return back()
                ->with('success', 'تم تحديث الخدمة  بنجاح');
        } catch (\Exception $e) {


            return back()
                ->with('error', 'لم يتم تحديث الخدمة  يرجى المحاولة مرة أخرى ');
        }
    }

    public function serviceDelete($id)
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);

        try {
            $service = serviceModel::findOrFail($id);


            serviceModel::destroy($service->id);

            return back()
                ->with('success', 'تم حذف  الخدمة بنجاح');
        } catch (\Exception $e) {


            return back()
                ->with('error', 'لم يتم حذف  الخدمة يرجى المحاولة مرة أخرى ');
        }
    }

    public function serviceGet(Request $request)
    {

        try {
            $service = serviceModel::where('department_id',$request->department)
                                     ->pluck('title')->toArray();

            return response()->json($service);

        } catch (\Exception $e) {

            return response()->json($e->getMessage());
        }
    }

    public function priceGet(Request $request)
    {

        try {
            $service = serviceModel::where('id',$request->service)
                ->pluck('price')->toArray();

            return response()->json($service);

        } catch (\Exception $e) {

            return response()->json($e->getMessage());
        }
    }

    public function sessionAddPage()
    {
        $clients = clientModel::orderBy('id', 'desc')
                                ->get();

        $departments = departmentModel::orderBy('id', 'desc')
                                        ->get();


        $serviceSalon = serviceModel::where('department_id',1)
                                      ->orderBy('id', 'desc')
                                      ->get();

        $serviceClinic = serviceModel::where('department_id',2)
                                       ->orderBy('id', 'desc')
                                       ->get();

        $serviceDoctor = serviceModel::where('department_id',3)
                                       ->orderBy('id', 'desc')
                                       ->get();


        return view('eyeson.session.add_session',
            [
                'departments'=>$departments,
                'clients'=>$clients,
                'serviceSalons'=>$serviceSalon,
                'serviceClinics'=>$serviceClinic,
                'serviceDoctors'=>$serviceDoctor
            ]);
    }

    public function sessionAdd(sessionAddRequest $request)
    {
        \DB::beginTransaction();
        try {

           $invoice= invoiceModel::create([
               'user_id'=>\Auth::user()->id,
               'total'=>$request->totalPrice,
               'paid'=>$request->paid,
               'reminding'=>$request->reminding
           ]);

            foreach ($request->service as $key => $services)
            {
                   sessionModel::create([
                  'department_id'=>$request->department,
                  'service_id'=>$services,
                  'price'=> $request->input('price')[$key],
                  'client_id'=>$request->client,
                   'note'=>"none",
                  'invoice_id'=>$invoice->id,
              ]);

            }
            \DB::commit();
            return view('eyeson.session.print_session', [
                'invoice' => $invoice
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
            \DB::rollBack();
            return back()
                ->with('error', 'يوجد خطأ لو يتم الاضافة يرجى المحاولة مرة أخرى!');
        }
    }

    public function invoiceManage()
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);
        $invoices = invoiceModel::get();

        return view('eyeson.session.manage_session', [
            'invoices' => $invoices
        ]);
    }

    public  function  invoiceDetails($id)
    {
        $invoice = invoiceModel::find($id);

        return view('eyeson.session.manage_invoice_details', [
            'invoice' => $invoice
        ]);
    }

    public function sessionEditPage($id)
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);
       $invoice =invoiceModel::find($id);

        $clients = clientModel::orderBy('id', 'desc')
            ->get();

        $departments = departmentModel::orderBy('id', 'desc')
            ->get();


        $serviceSalon = serviceModel::where('department_id',1)
            ->orderBy('id', 'desc')
            ->get();

        $serviceClinic = serviceModel::where('department_id',2)
            ->orderBy('id', 'desc')
            ->get();

        $serviceDoctor = serviceModel::where('department_id',3)
            ->orderBy('id', 'desc')
            ->get();


        return view('eyeson.session.edit_session',
            [
                'departments'=>$departments,
                'clients'=>$clients,
                'serviceSalons'=>$serviceSalon,
                'serviceClinics'=>$serviceClinic,
                'serviceDoctors'=>$serviceDoctor,
                'invoice'=>$invoice
            ]);
    }

    public function sessionEdit(sessionEditRequest $request)
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);

        \DB::beginTransaction();
        try {

            $invoice = invoiceModel::findOrFail($request->invoice);

             invoiceModel::where('id',$request->invoice)->update([
                'user_id'=>1,
                'total'=>$request->totalPrice,
                'paid'=>$request->paid,
                'reminding'=>$request->reminding
            ]);


            foreach ($invoice->session as $key => $session)
            {

               $sessions= sessionModel::where('id',$request->input('session')[$key])->
                              where('invoice_id',$request->invoice)->
                              update([
                                    'department_id'=>$request->department,
                                    'service_id'=>$request->input('service')[$key],
                                    'price'=> $request->input('price')[$key],
                                    'client_id'=>$request->client,
                                    'note'=>"none",

                                ]);

            }

            \DB::commit();
            return back()
                ->with('success', 'تم تعديل الفاتورة  بنجاح');
        } catch (\Exception $e) {

            \DB::rollBack();
            return back()
                ->with('error', 'يوجد خطأ لو يتم تعديل يرجى المحاولة مرة أخرى!');
        }
    }

    public function sessionDelete($id)
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);
        \DB::beginTransaction();
        try {
            $invoice = invoiceModel::findOrFail($id);

            foreach ($invoice->session as $key => $session) {
                sessionModel::destroy($session->id);
            }


            invoiceModel::destroy($invoice->id);

            \DB::commit();

            return back()
                ->with('success', 'تم حذف  الفاتورة بنجاح');
        } catch (\Exception $e) {

            \DB::rollBack();
            return back()
                ->with('error', 'لم يتم حذف  الفاتورة يرجى المحاولة مرة أخرى ');
        }
    }

    public function analysis()
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);
        $allTotal = invoiceModel::sum('total');
        $allPaid  = invoiceModel::sum('paid');
        $allReminding = invoiceModel::sum('reminding');

        $salonTotal = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',1 );
        })->sum('total');

        $salonPaid = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',1 );
        })->sum('paid');

        $salonReminding = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',1 );
        })->sum('reminding');


        $clinicTotal = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',2 );
        })->sum('total');

        $clinicPaid = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',2 );
        })->sum('paid');

        $clinicReminding = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',2 );
        })->sum('reminding');



        $doctorTotal = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',3 );
        })->sum('total');

        $doctorPaid = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',3 );
        })->sum('paid');

        $doctorReminding = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',3 );
        })->sum('reminding');

        return view('eyeson.session.manage_analysis',
            [
                'allTotal'=>$allTotal,
                'allPaid'=>$allPaid,
                'allReminding'=>$allReminding,


                'salonTotal'=>$salonTotal,
                'salonPaid'=>$salonPaid,
                'salonReminding'=>$salonReminding,

                'clinicTotal'=>$clinicTotal,
                'clinicPaid'=>$clinicPaid,
                'clinicReminding'=>$clinicReminding,

                'doctorTotal'=>$doctorTotal,
                'doctorPaid'=>$doctorPaid,
                'doctorReminding'=>$doctorReminding,
            ]);

    }

    public function analysisSearch(analysisSearchRequest $request)
    {
        if(\Auth::user()->user_type_id == 2)
            abort(404);
        $endDate = Carbon::parse($request->endDate)->addHour(23)->addMinute(59)->addSecond(59);


        $allTotal = invoiceModel::whereBetween('created_at', array($request->startDate,$endDate))->sum('total');
        $allPaid  = invoiceModel::whereBetween('created_at', array($request->startDate,$endDate))->sum('paid');
        $allReminding = invoiceModel::whereBetween('created_at', array($request->startDate,$endDate))->sum('reminding');

        $salonTotal = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',1 );
        })->whereBetween('created_at', array($request->startDate,$endDate))->sum('total');

        $salonPaid = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',1 );
        })->whereBetween('created_at', array($request->startDate,$endDate))->sum('paid');

        $salonReminding = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',1 );
        })->whereBetween('created_at', array($request->startDate,$endDate))->sum('reminding');


        $clinicTotal = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',2 );
        })->whereBetween('created_at', array($request->startDate,$endDate))->sum('total');

        $clinicPaid = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',2 );
        })->whereBetween('created_at', array($request->startDate,$endDate))->sum('paid');

        $clinicReminding = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',2 );
        })->whereBetween('created_at', array($request->startDate,$endDate))->sum('reminding');



        $doctorTotal = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',3 );
        })->whereBetween('created_at', array($request->startDate,$endDate))->sum('total');

        $doctorPaid = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',3 );
        })->whereBetween('created_at', array($request->startDate,$endDate))->sum('paid');

        $doctorReminding = invoiceModel::WhereHas('session',function ( $query ){
            $query->where('department_id',3 );
        })->whereBetween('created_at', array($request->startDate,$endDate))->sum('reminding');

        return view('eyeson.session.manage_analysis',
            [
                'allTotal'=>$allTotal,
                'allPaid'=>$allPaid,
                'allReminding'=>$allReminding,


                'salonTotal'=>$salonTotal,
                'salonPaid'=>$salonPaid,
                'salonReminding'=>$salonReminding,

                'clinicTotal'=>$clinicTotal,
                'clinicPaid'=>$clinicPaid,
                'clinicReminding'=>$clinicReminding,

                'doctorTotal'=>$doctorTotal,
                'doctorPaid'=>$doctorPaid,
                'doctorReminding'=>$doctorReminding,
            ]);

    }

    public function clientGet(Request $request)
    {


        try {
            $data = invoiceModel::WhereHas('session',function ( $query ) use($request){
                $query->where('client_id',$request->client );
            })->sum('reminding');


            return response()->json($data);

        } catch (\Exception $e) {

            return response()->json($e->getMessage());
        }
    }


}
