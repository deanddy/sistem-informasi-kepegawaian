<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
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
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
		$user = \App\User::findOrFail($id);
		
		return view('users.show', ['user' => $user]);
	}
	
	public function showProfile($id)
	{
		$user = \App\User::findOrFail($id);
		
		return view('users.show_profile', ['user' => $user]);
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
	
	public function updateProfile(Request $request)
  {
    $id = \Auth::user()->id;

    $user = \App\User::findOrFail($id);
    $user->tempat_tinggal = $request->get('tempat_tinggal');
    $user->status_perkawinan = $request->get('status_perkawinan');
    $user->jenis_kelamin = $request->get('jenis_kelamin');
    $user->jumlah_anak = $request->get('jumlah_anak');
    $user->email = $request->get('email');
    $user->telepon = $request->get('telepon');
    $user->pendidikan_terakhir = strtoupper($request->get('pendidikan_terakhir'));
    $user->jurusan_pendidikan_terakhir = strtoupper($request->get('jurusan_pendidikan_terakhir'));

    $user->save();

    return redirect()->route('profile', $id)->with('status', 'Data berhasil di update');
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
