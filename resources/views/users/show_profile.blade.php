@extends('layouts.app')

@section('title')
  Profile User
@endsection

@section('content')
   <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Menu Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Hi, {{Auth::user()->username}}!</h2>
            <p class="section-lead">
              Berikut adalah informasi mengenai akun mu.
            </p>

            <div class="row mt-sm-4">
              
              
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">

                  <form method="post" class="needs-validation" novalidate="" action="{{route('profile.update', [\Auth::user()->id])}}"> 

                    @csrf
                    <input type="hidden" value="PUT" name="_method">

                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>

                    <div class="card-body">

                      @if(session('status'))
                      <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                          <button class="close" data-dismiss="alert">
                            <span>×</span>
                          </button>
                          {{session('status')}}
                        </div>
                      </div>
                      @endif

                        <div class="row">
                          <div class="form-group col-md-12">
                            <label for="">Foto</label><br>
                            @if(Auth::user()->foto)
                              <img 
                                src="{{asset('storage/'.Auth::user()->foto)}}" 
                                width="120px" />
                              <br>
                            @else 
                              No avatar
                            @endif
                          </div>
                        </div>

                        <div class="row">                               
                          <div class="form-group col-md-12">
                            <label>Username</label>
                            <input type="text" value="{{Auth::user()->username}}" class="form-control" disabled>
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Roles</label><br>
                            <input 
                              type="checkbox" 
                              class="form-group"
                              {{in_array("ADMIN", json_decode(Auth::user()->roles)) ? "checked" : ""}}
                              name="roles[]" 
                              value="ADMIN"
                              id="ADMIN" 
                              required=""
                              disabled/>
                            <label for="">Admin</label>

                            <input 
                              type="checkbox" 
                              class="form-group"
                              {{in_array("PEGAWAI", json_decode(Auth::user()->roles)) ? "checked" : ""}}
                              name="roles[]" 
                              value="PEGAWAI"
                              id="PEGAWAI" 
                              required=""
                              disabled/>
                            <label for="">Pegawai</label>

                            <input 
                              type="checkbox" 
                              class="form-group"
                              {{in_array("DIREKTUR", json_decode(Auth::user()->roles)) ? "checked" : ""}}
                              name="roles[]" 
                              value="DIREKTUR"
                              id="DIREKTUR" 
                              required=""
                              disabled/>
                            <label for="">Direktur</label>
                          </div>

                          <div class="form-group col-md-5 col-12">
                            <label>Status akun</label><br>
                            <input 
                              {{\Auth::user()->status == "ACTIVE" ? "checked" : ""}} 
                              value="ACTIVE" 
                              type="radio" 
                              class="form-group" 
                              id="active" 
                              disabled/> 
                            <label for="active">Active</label>

                            <input 
                              {{\Auth::user()->status == "INACTIVE" ? "checked" : ""}} 
                              value="INACTIVE" 
                              type="radio" 
                              class="form-group" 
                              id="active" 
                              disabled/> 
                            <label for="active">Inactive</label>
                          </div>
                          
                        </div>

                        <div class="row">                               
                          <div class="form-group col-md-12">
                            <label>Nama Lengkap</label>
                            <input type="text" value="{{Auth::user()->name}}" class="form-control" disabled>
                           
                          </div>
                        </div>

                        <div class="row">                               
                          <div class="form-group col-md-7 col-12">
                            <label>Tempat Lahir</label>
                            <input type="text" value="{{Auth::user()->tempat_lahir}}" class="form-control" disabled>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Tanggal Lahir</label>
                            <input type="date" value="{{Auth::user()->tanggal_lahir}}" class="form-control" disabled>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-12">
                            <label>Tempat Tinggal Sekarang</label>
                            <textarea class="form-control summernote-simple" style="display: true;" name="tempat_tinggal" id="tempat_tinggal">{{Auth::user()->tempat_tinggal}}
                            </textarea>
                          </div>
                        </div>

                         <div class="row">                               
                          <div class="form-group col-md-7 col-12">
                            <label>Status Perkawinan</label>
                            <select name="status_perkawinan" id="status_perkawinan" class="form-control" >
                              <option value="MENIKAH" {{\Auth::user()->status_perkawinan == "MENIKAH" ? "selected" : ""}}>MENIKAH</option>
                              <option value="BELUM MENIKAH" {{\Auth::user()->jenis_kelamin == "BELUM MENIKAH" ? "selected" : ""}}>BELUM MENIKAH</option>
                            </select>
                          </div>

                          <div class="form-group col-md-5 col-12">
                            <label>Jenis Kelamin</label><br>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" >
                              <option value="PRIA" {{\Auth::user()->jenis_kelamin == "PRIA" ? "selected" : ""}}>PRIA</option>
                              <option value="WANITA" {{\Auth::user()->jenis_kelamin == "WANITA" ? "selected" : ""}}>WANITA</option>
                            </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>NIK</label>
                            <input type="text" class="form-control" value="{{Auth::user()->nik}}" required="" disabled>
                            <div class="invalid-feedback">
                              Please fill in the nik
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Jumlah Anak</label>
                            <input type="text" class="form-control" value="{{Auth::user()->jumlah_anak}}" name="jumlah_anak" id="jumlah_anak"/>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{Auth::user()->email}}" required="" name="email" id="email">
                          </div>

                          <div class="form-group col-md-5 col-12">
                            <label>Telepon</label>
                            <input type="tel" class="form-control" value="{{Auth::user()->telepon}}" name="telepon" id="telepon">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Jurusan Pendidikan Terakhir</label>
                            <input type="text" class="form-control" value="{{Auth::user()->jurusan_pendidikan_terakhir}}" name="jurusan_pendidikan_terakhir" id="jurusan_pendidikan_terakhir">
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Pendidikan Terakhir</label>
                            <input type="text" class="form-control" value="{{Auth::user()->pendidikan_terakhir}}" required="" name="pendidikan_terakhir" id="pendidikan_terakhir">
                            <div class="invalid-feedback">
                              Please fill in the Pendidikan
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Posisi Jabatan</label>
                            <input type="text" class="form-control" value="{{\Auth::user()->jabatan_id}}" disabled>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Rayon Kerja</label>
                            <input type="text" class="form-control" value="{{\Auth::user()->rayon_kerja}}" required="" disabled>
                            <div class="invalid-feedback">
                              Please fill in the Pendidikan
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Nomor Rekening</label>
                            <input type="text" class="form-control" value="{{\Auth::user()->no_rekening}} - {{ \Auth::user()->nama_bank }}" disabled>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Sisa Cuti Tahunan</label>
                            <input type="text" class="form-control" value="{{\Auth::user()->sisa_cuti_tahunan}} hari" disabled>
                          </div>
                        </div>

                      
                      
                       

                        
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>


                </div>
              </div>
            </div>
          </div>

        </section>
      </div>
@endsection