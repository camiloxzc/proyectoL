@extends('backoffice.layouts.dashboard')

@section('title', __('shopping'))

@section('dashboard-content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('admin.shopping.store')}}" method="post" class="form-horizontal" onsubmit="return  confirm('¿Esta seguro de guardar la compra?')">
                    @csrf
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title"> Registrar Compra</h4>
                            <p class="card-category">Ingresar datos</p>
                        </div>

                        <div class="card-body">
                            <div class="row ">
                                <label for="proveedor_id" class="col-sm-2 col-form-label">Proveedor</label>
                                <div class="col-sm-7 ">
                                    <select name="proveedor_id" id="proveedor_id" class="my-1 form-control">
                                        <option class="form-control" value="">Seleccione el proveedor</option>
                                        @foreach ($providers as $proveedor)
                                        <option class="form-control" autofocus value="{{ $proveedor['idproveedor'] }}">{{ $proveedor['proveedor'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Ingrese fecha " autofocus value="{{ old('fecha') }}">
                                    @if ($errors->has('fecha'))
                                    <span class="error text-danger" for="input-fecha">{{ $errors->first('fecha') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label for="numerofactura" class="col-sm-2 col-form-label">numerofactura</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="numerofactura" placeholder="Ingrese el numerofactura" value="{{ old('numerofactura') }}">
                                    @if ($errors->has('numerofactura'))
                                    <span class="error text-danger" for="input-numerofactura">{{ $errors->first('numerofactura') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a data-toggle="modal" href="#myModal">
                                    <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fa fa-plus"></span> Añadir Productos</button>
                                </a>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                                <table class="table table-striped table-bordered table-condensed table-hover">
                                    <thead style="background-color:#C378CD">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>IVA</th>
                                            <th>Subtotal</th>
                                            <th>Precio Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cajaDetalle">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row ml-auto mr-auto">
                            <div class="col-md-12 ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    @lang('Guardar')</button>
                                <a href="{{ route('admin.shopping.index') }}" class="btn btn-danger ">
                                    <i class="fa fa-arrow-circle-left"></i>
                                    @lang('cancelar')
                                </a>
                            </div>
                        </div>
                    </div>

            </div>
            <!--Footer-->

            <!--End footer-->

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h4 class="modal-title">Seleccione un Producto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body table-responsive">
                            <div class="dataTables_wrapper">
                                <div class="dt-buttons">
                                </div>
                                <div class="card-body">
                                    <div class="row ">
                                        <label for="idservicioproducto" class="col-sm-2 col-form-label">nombre</label>
                                        <div class="col-sm-7 ">
                                            <select name="idservicioproducto" id="idservicioproducto" class="my-1 form-control">
                                                <option class="form-control" value="">Seleccione el producto</option>
                                                @foreach ($inventory as $inventory)
                                                <option class="form-control" autofocus value="{{ $inventory->idservicioproducto }}">{{ $inventory->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="precio" class="col-sm-2 col-form-label">Precio</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio " autofocus>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="cantidad" class="col-sm-2 col-form-label">cantidad</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad " autofocus>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="iva" class="col-sm-2 col-form-label">iva</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="iva" name="iva" placeholder="Ingrese el IVA " autofocus>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="subtotal" class="col-sm-2 col-form-label">Subtotal</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="subtotal " autofocus>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="preciototal" class="col-sm-2 col-form-label">preciototal</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" id="preciototal"  name="preciototal" placeholder="Precio Total" value="{{ old('preciototal') }}">
                                            @if ($errors->has('preciototal'))
                                            <span class="error text-danger" for="input-preciototal">{{ $errors->first('preciototal') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-warning" id="agregarProducto"><span class="fa fa-plus"></span></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->

<!-- Fin modal -->
@endsection
@push('after-scripts')
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/validations.js') }}"></script>
@endpush
