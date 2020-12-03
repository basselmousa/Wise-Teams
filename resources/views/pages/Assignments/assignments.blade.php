@extends('layouts.app')
@section('title','Teams');
@section('nav-title','Assignments')
@include('layouts.SideNavigation')
@section('list-item')
    <li><a href="/assignments/new"> <i class="fas fa-plus"></i> Create new Assignment</a></li>
@stop
@section('content')
    <section class="Assignments mt-5">
            <div class="row justify-content-center">
              <div class="col-10">
                  <table class="table table-striped">
                      <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Team</th>
                          <th scope="col">End Date</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <th scope="row">1</th>
                          <td><a href="/assignments/Member-assignments">Mark</a></td>
                          <td>Otto</td>
                          <td>@mdo</td>
                      </tr>
                      <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                      </tr>
                      <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>the Bird</td>
                          <td>@twitter</td>
                      </tr>
                      </tbody>
                  </table>

              </div>
            </div>
    </section>
@stop
