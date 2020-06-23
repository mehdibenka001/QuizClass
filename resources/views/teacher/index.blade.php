@extends('layouts.master')

@section('section-title')
Welcome back {{ auth()->user()->name }}
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="row profile-center">
      {{-- PROFILE --}}
      <div class="col-md-6">
        <div class="quizclass-profile-wrapper">
          <img src="https://flyinglabs.org/wp-content/uploads/2018/11/Toumi-BOUCHENTOUF-e1541515191627-470x451.png" alt="profile-img" />
          <div class="about">
            <h3>{{ auth()->user()->name }}</h3>
            <p class="job-title">Professeur Habilité en Informatique - <span class="university">ENSA d'Oujda</span></p>
            <p>Oujda, morocco</p>
          </div>
        </div>
        <p>I am an associate professor (PH) at National School of Applied Sciences (ENSAO), First Mohammed University, Oujda, Morocco, since 2017.</p>
      </div>

      {{-- STATS --}}

      <div class="col-md-6">
        <div class="row">
          <div class="col-xl-6 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Modules</h5>
                    <span class="h2 font-weight-bold mb-0">5</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-books"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Quizzes</h5>
                    <span class="h2 font-weight-bold mb-0">12</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="ni ni-bulb-61"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Etudiants</h5>
                    <span class="h2 font-weight-bold mb-0">120</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                      <i class="ni ni-single-02"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Questions</h5>
                    <span class="h2 font-weight-bold mb-0">158</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                      <i class="ni ni-bullet-list-67"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
@endsection