@extends('backoffice.layouts.dashboard')

@section('title', __('calendar'))

@section('dashboard-content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    <div id="calendar"></div>

    <!-- Modal -->
    <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Datos del evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id='calendarFrm' action="">
                    {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="user_id" class="col-sm-2 col-form-label">Profesional</label>
                            <br>
                            <select class="form-control" name="user_id" id="user_id" class="">
                                <option class="form-control selectpicker" value="">Escoje profesional</option>
                                @foreach ($users as $user)
                                    <option class="form-control " autofocus value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inventory_id" class="col-sm-2 col-form-label">Servicios</label>
                            <br>
                            <select multiple="multiple" name="inventory_id[]" id="services">
                                @foreach ($inventories as $inventory)
                                    <option autofocus value="{{ $inventory->idservicioproducto }}">{{ $inventory->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="start">Start</label>
                            <input type="datetime" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="" readonly>
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                        <div class="form-group d-none">
                            <label for="end">end</label>
                            <input type="datetime" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                        <div class="form-group">
                            <label for="startHour">Hora Inicio</label>
                            <input type="time" class="form-control" name="startHour" id="startHour" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                        <div class="form-group">
                            <label for="endHour">Hora final</label>
                            <input type="time" class="form-control" name="endHour" id="endHour" aria-describedby="helpId" placeholder="">
                            <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnGuardar">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="display" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Datos del evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalDisplay">
                    <p class="description">
                        <div class="form-group">
                            <label for="">ID</label>
                            <input class="form-control"  id="show-id" aria-describedby="helpId" readonly />
                        </div>
                        <div class="form-group">
                            <label for="">Profesional</label>
                            <input class="form-control"  id="show-user_id" aria-describedby="helpId" readonly />
                        </div>
                        <div class="form-group">
                            <label for="">Fecha</label>
                            <input class="form-control"  id="show-start" aria-describedby="helpId" readonly />
                        </div>
                        <div class="form-group d-none">
                            <label for="">Final</label>
                            <input class="form-control"  id="show-end" aria-describedby="helpId" readonly />
                        </div>
                    <div class="form-group">
                        <label for="">Hora inicio</label>
                        <input class="form-control"  id="show-start-hour" aria-describedby="helpId" readonly />
                    </div>
                    <div class="form-group">
                        <label for="">Hora final</label>
                        <input class="form-control"  id="show-end-hour" aria-describedby="helpId" readonly />
                    </div>
                    <p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="btnElminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>
        $('#services').select2({
            width: '100%',
            placeholder: 'Seleccione Servicios',
            allowClear: true
        });
    </script>
    <script src="{{ asset('js/calendar.js') }}" defer></script>
@endpush
