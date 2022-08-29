<?php

namespace App\Http\Controllers\zoom;


use App\Http\Controllers\Controller;
use App\Http\Traits\ZoomMeetingTrait;
use App\Mail\LoginandPassword;
use App\Mail\ZoomUrlMail;
use App\Models\ArmoredZoomTime;
use App\Models\Meeting;
use App\Models\ZoomTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ZoomMeetingsController extends Controller
{
    use ZoomMeetingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $mentor=ZoomTime::all()->where('free_to_zoom',$request->start_time)->first();
        $meeting = $this->createMeeting($request);
        Meeting::create([
            'meeting_id' => $meeting->id,
            'topic' => $request->topic,
            'start_time' => $request->start_time,
            'duration' => $meeting->duration,
            'password' => $meeting->password,
            'status' => $request->status,
            'start_url' => $meeting->start_url,
            'mentor' => $mentor->mentor,
            'email'=>auth()->user()->email,
            'join_url' => $meeting->join_url,
        ]);
            $armored_zoom_time= new ArmoredZoomTime();
            $armored_zoom_time->mentor_name =$mentor->mentor;
            $armored_zoom_time->appointed_time =$mentor->free_to_zoom;
            $armored_zoom_time->student_name = auth()->user()->name;
            $armored_zoom_time->zoom_url = $meeting->join_url;
            $armored_zoom_time->save();
            $mentor::destroy($mentor->id);
        Mail::to(auth()->user()->email)->send(new ZoomUrlMail(auth()->user()->name,$meeting->join_url,$request->start_time));
        return view('mail.bookingSuccess');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
