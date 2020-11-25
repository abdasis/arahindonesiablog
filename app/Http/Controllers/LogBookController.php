<?php

namespace App\Http\Controllers;

use App\Models\LogBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class LogBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logbooks = LogBook::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        return view('pages.logbooks.index')->with(['logbooks' => $logbooks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.logbooks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $logbook = new LogBook();
        $logbook->tugas = $request->get('task');
        $logbook->status = 'Proses';
        $logbook->save();
        Session::flash('status', 'Tugas berhasil ditambahkan');
        return redirect()->route('logbook.index');
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
        $logbook = LogBook::find($id);
        return view('pages.logbooks.edit')->withLogbook($logbook);
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
        $logbook = LogBook::find($id);
        $logbook->tugas = $request->get('task');
        $logbook->status = $logbook->status;
        $logbook->save();
        Session::flash('status', 'Tugas berhasil ditambahkan');
        return redirect()->route('logbook.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $logbook = LogBook::find($id);
        $logbook->delete();
        Session::flash('status', 'Tugas berhasil dihapus');
        return redirect()->route('logbook.index');

    }

    public function selesai($id)
    {
        $logbook = LogBook::find($id);
        if ($logbook->status == 'Selesai') {
            Session::flash('status', 'Tugas anda sudah selesai');
            return redirect()->route('logbook.index');
        }else{
            $logbook->status = 'Selesai';
            $t1 = Carbon::parse($logbook->created_at);
            $t2 = Carbon::parse($logbook->updated_at);
            $logbook->save();
            $diffMinutes = $t1->diffInMinutes($t2);
            $diffSecond = $t1->diffInMinutes($t2);
            Session::flash('status', 'Selamat tugas anda sudah selesai dalam waktu ' . $diffMinutes .  ' menit ' . $diffSecond . ' detik' );
            return redirect()->route('logbook.index');
        }
    }

    public function lapor()
    {
        $logbooks = LogBook::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $to_name = "Lailatul Karimah";
        $to_email = "lailatul.karimah123@gmail.com";
        $data = array("name"=> "Abd. Asis", "body" => $logbooks);
        Mail::send('pages.emails.email', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject("Laporan Aktifivitas Minggu Ini");
        $message->from("id.abdasis@gmail.com");
        });
        return redirect()->back();
    }
}
