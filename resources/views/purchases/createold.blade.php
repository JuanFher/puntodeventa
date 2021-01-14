@extends('layouts.template')
@section('title', 'Registrar Compra')
@section('styles')
  
@endsection
@section('content')
	<div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Imgreso de Compra
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crear Nueva</li>
              </ol>
            </nav>
          </div>
          <div class="card">
            <div class="card-body">
              {!! Form::open(['route'=>'purchases.store', 'method'=>'POST']) !!}
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de compra</h4>
                    </div>
                    
                    <div class="row">
                      <div class="col-12 grid-margin">
                        <div class="card">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="card-body">
                                <label for="provider_id">Proveedor</label>
                                      <select class="js-example-basic-single w-100" name="provider_id" id="provider_id">
                                          @foreach ($providers as $provider)
                                          <option value="{{$provider->id}}">{{$provider->name}}</option>
                                          @endforeach
                                      </select>
                                      <label for="tax">Impuesto</label>
                                    <div class="input-group">

                                        <input type="number" class="form-control" name="tax" id="tax" aria-describedby="basic-addon3"
                                            placeholder="18">
                                    </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="card-body mb-3">
                                <label><strong>Tipo</strong></label>
                                <select id="type" name="type" class="js-example-basic-single w-100">
                                  <option value="Elegir">-- Selecione --</option>
                                  <option value="FACTURA">FACTURA</option>
                                  <option value="RECIBO">RECIBO</option>
                                  <option value="PROFORMA">PROFORMA</option>
                                </select>
                                <div class="col-md-6 float-left mt-2">
                                  <label>Fecha de compra</label>
                                              <input class="form-control date datepicker" id="purchase_date" name="purchase_date" type="date" />
                                </div>
                                <div class="col-md-6 float-left mt-2">
                                  <label>Número de Documento</label>
                                              <input class="form-control" id="number_fact" name="number_fact" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  {{-- <div class="form-group">
                      <label for="code">Código de barras</label>
                      <input type="text" name="code" id="code" class="form-control" placeholder="" aria-describedby="helpId">
                  </div> --}}

                  <div class="row">
                        <div class="col-lg-5 grid-margin grid-margin-lg-0">
                          <div class="form-group">
                            <label for="name"><strong>Buscar Producto</strong></label>
                                      <select class="js-example-basic-single w-100" name="pproduct_id" id="pproduct_id">
                                        <option value="Elegir">-- Seleccione un Producto --</option>
                                        @foreach ($products as $product)
                                          <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                      </select>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label for="stock"><strong>Cantidad</strong></label>
                            <input type="number" value="{{old('quantity')}}" name="pquantity" id="pquantity" class="form-control" placeholder="Cantidad" >
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label for="stock"><strong>Precio de compra</strong></label>
                            <input type="number" value="{{old('buy_price')}}"  name="pbuy_price" id="pbuy_price" class="form-control" placeholder="Precio de compra" >
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label for="stock"><strong>Precio de venta</strong></label>
                            <input type="number" value="{{old('sell_price')}}" name="psell_price" id="psell_price" class="form-control" placeholder="Precio de venta" >
                          </div>
                        </div>
                        <div class="col-lg-1">
                          <div class="form-group">
                            <button class="btn btn-primary float-right mt-4 ml-2 " id="addProduct" >Agregar</button>
                          </div>
                        </div>
                      </div>
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="card px-2">
                              <div class="card-body">
                                  <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                                    <div class="table-responsive w-100">
                                        <table id="details" class="table">
                                          <thead>
                                            <tr class="bg-dark text-white">
                                                <th>#</th>
                                                <th>Descripción</th>
                                                <th class="text-right">Cantidad</th>
                                                <th class="text-right">Precio de compra</th>
                                                <th class="text-right">Precio de venta</th>
                                                <th class="text-right">subtotal</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr class="text-right">
                                                <td class="text-left">1</td>
                                                <td class="text-left">Brochure Design</td>
                                                <td>2</td>
                                                <td>$20</td>
                                                <td>$20</td>
                                                <td>$40</td>
                                              </tr>

                                          </tbody>
                                        </table>
                                      </div>
                                  </div>
                                  <div class="container-fluid mt-5 w-100">
                                    <p class="text-right mb-2">SubTotal: <span id="total">$12,348</span></p>
                                    <p class="text-right">Iva (12%) : <span id="total_impuesto">$12,348</span></p>
                                    <h4 class="text-right mb-5">Total : <span id="total_pagar_html">$12,348</span></h4>
                                    <input type="hidden" name="total" id="total_pagar"></p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                @csrf
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                     <a href="{{route('purchases.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                </div>
                {!! Form::close() !!}
            </div>
          </div>
        </div>
@endsection
@section('scripts')
    {!! Html::script('assets/js/select2.js') !!}"></script>
    {!! Html::script('assets/js/alerts.js') !!}
    {!! Html::script('assets/js/avgrund.js') !!}
<script>
    $(document).ready(function () {
        $("#addProduct").click(function () {
            agregar();
        });
    });

    var cont = 0;
    total = 0;
    subtotal = [];

    $("#guardar").hide();

    function agregar() {
    
        product_id = $("#pproduct_id").val();
        producto = $("#pproduct_id option:selected").text();
        quantity = $("#pquantity").val();
        sell_price = $("#psell_price").val();
        buy_price = $("#pbuy_price").val();
        impuesto = $("#tax").val();
    
        if (product_id != "" && quantity != "" && quantity > 0 && sell_price != "" && buy_price != "") {
            subtotal[cont] = quantity * buy_price;
            total = total + subtotal[cont];
            var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td> <td><input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'</td> <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input class="form-control" type="number" value="' + quantity + '" disabled></td> <td> <input type="hidden" id="price[]" name="buy_price[]" value="' + buy_price + '"> <input class="form-control" type="number" id="buy_price[]" value="' + buy_price + '" disabled> </td> <td> <input type="hidden" id="sell_price[]" name="sell_price[]" value="' + sell_price + '"> <input class="form-control" type="number" id="sell_price[]" value="' + sell_price + '" disabled>    </td> <td align="right">SubTotal$' + subtotal[cont] + ' </td></tr>';

            cont++;
            cleanRows();
            totales();
            evaluar();
            $('#details').append(fila);
        } else {
            Swal.fire({
                type: 'error',
                text: 'Rellene todos los campos del detalle de la compras',
    
            })
        }
    }

    function cleanRows() {
      $("#pproduct_id").val("");
      $("#psell_price").val("");
      $("#pquantity").val("");
      $("#pbuy_price").val("");
    }

    function totales() {
        $("#total").html("PEN " + total.toFixed(2));
        total_impuesto = total * impuesto / 100;
        total_pagar = total + total_impuesto;
        $("#total_impuesto").html("PEN " + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("PEN " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
    }

    function eliminar(index) {
        total = total - subtotal[index];
        total_impuesto = total * impuesto / 100;
        total_pagar_html = total + total_impuesto;
        $("#total").html("PEN" + total);
        $("#total_impuesto").html("PEN" + total_impuesto);
        $("#total_pagar_html").html("PEN" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
        $("#fila" + index).remove();
        evaluar();
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        } else {
            $("#guardar").hide();
        }
    }
</script>
@endsection
