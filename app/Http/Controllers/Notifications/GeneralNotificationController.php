<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Purchase\RequisitionController;
use App\Models\Notifications\GeneralNotification;
use App\Services\Notifications\GeneralNotificationService;
use Illuminate\Http\Request;

class GeneralNotificationController extends Controller
{

    /**
     * Service variable
     *
     * @var GeneralNotificationService
     */
    private $service; 
    function __construct(GeneralNotificationService $service)
    {
        $this->service = $service;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['generalNotifications'] = $this->service->getAll();

        return view("notifications.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            //validate rules
        ]);
        $this->service->store($validate);
        return redirect()->route('generalNotifications.index')->with('success', 'GeneralNotification created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data['generalNotification'] = $this->service->show($id);

        return view("generalNotifications.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralNotification $generalNotification)
    {
        $data['generalNotification'] = $generalNotification;
        //
        return view("generalNotifications.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GeneralNotification $generalNotification)
    {
        $validate = $request->validate([
            //validate rules
        ]);
        $this->service->update($generalNotification, $validate);

        return redirect()->route('generalNotifications.index')->with('success', 'GeneralNotification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneralNotification $generalNotification)
    {
        $this->service->delete($generalNotification);
        return redirect()->route('generalNotifications.index')->with('success', 'GeneralNotification deleted successfully.');
    }

    public function getNotificationCount()
    {

        $host = $this->service->getNotificationCount();
        return response()->json($host);
    }

    public function getNotifications()
    {
        $host = $this->service->getNotifications();
        return response()->json($host);
    }


    public function notificationAction($id){
        $generalNotification = GeneralNotification::find($id);

        $generalNotification->update([
            'status' => 2
        ]);
        $this->service->updateNotificationCount();

        if( $generalNotification->action){
            $action = json_decode($generalNotification->action, true);
            $controllerClass = $action['controller'];
            $method = $action['method'];
            $parameters = $action['params'];
            $controller = app()->make($controllerClass);

            return $controller->callAction($method, $parameters);
        }

        return redirect()->back();
    }
}
