@extends('Panel.layouts.index')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <!-- BEGIN: Left Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

            <!-- BEGIN: Aside Menu -->
            <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
                @include('Panel.layouts.menu')
            </div>

            <!-- END: Aside Menu -->
        </div>

         <!-- END: Left Aside -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Create Appointment
                            </h3>
                        </div>
                    </div>
                    <div class="m-portlet__head-tools">
                        <ul class="m-portlet__nav">
                            <li class="m-portlet__nav-item">
                                <a href="{{ route('appointments.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>
                                        Create Appointment
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="m-portlet__nav-item"></li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="appointmets">
                        <table class="table responsive">
                           <thead>
                               <tr>
                                   <td>#</td>
                                   <td>time</td>
                                   <td>service</td>
                                   <td>patient</td>
                                   <td></td>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($appointments as $appointment)
                               <tr>
                                <td>{{$appointment->id}}</td>
                                <td>{{$appointment->date}}</td>
                                <td>{{$appointment->service ? $appointment->service->title:''}}</td>
                                <td>{{$appointment->patient?$appointment->patient->idPateints:''}}</td>
                                <td>
                                    <a href="{{ route('appointments.edit',$appointment->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('appointments.destroy',$appointment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                               </tr>
                               @endforeach
                           </tbody>
                        </table>
                    </div>
                </div>

</div>
@stop
