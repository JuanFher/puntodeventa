<div>
    @if ($selected_id > 0)        
	<div class="row">
		<div class="col-12 grid-margin">
			<div class="card">
				<div class="row">
					<div class="col-md-6">
						<div class="card-body">

							<h4 class="mb-4" ><strong>Nombre del proveedor: </strong>
							{{ $provider->name }}
							</h4>
							<button type="button" wire:click="doAction(0)" class="btn btn-outline-secondary btn-rounded btn-icon float-right">
								<i class="fas fa-trash text-danger"></i>
							</button>
							<p class="ml-5"><strong>Ruc: </strong>{{ $provider->ruc_number }}</p>
							<p class="ml-5"><strong>Teléfono: </strong>{{ $provider->phone }}</p>
							<p class="ml-5"><strong>Email: </strong>{{ $provider->email }}</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card-body mb-3">
							<label><strong>Tipo</strong></label>
							<select id="type" class="form-control text-center">
								<option value="Elegir">-- Selecione --</option>
								<option value="FACTURA">FACTURA</option>
								<option value="RECIBO">RECIBO</option>
								<option value="PROFORMA">PROFORMA</option>
							</select>
							<div class="col-md-6 float-left mt-2">
								<label>Fecha de compra</label>
                        		<input class="form-control" type="date" />
							</div>
							<div class="col-md-6 float-left mt-2">
								<label>Número de Documento</label>
                        		<input class="form-control"  />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
          
    @else
    	<div class="row">
           <div class="col-12 grid-margin">
              <div class="card">
                <div class="row">
                  <div class="col-md-6">
                    <div class="card-body">
                      
                      <label for="category_id"><strong>Proveedor</strong></label>
						<select wire:model.lazy="selected_id" name="category_id" class="form-control form-control-lg">
							<option>--- Seleccione uno ---</option>
							@foreach ($providers as $provider)
								<option value="{{ $provider->id }}">{{ $provider->name }}</option>
							@endforeach
						</select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card-body">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    @endif
	<div class="form-control">
		<div class="row">
			<div class="col-lg-5 grid-margin grid-margin-lg-0">
				<div class="form-group" wire:ignore>
					<label for="name"><strong>Buscar Producto</strong></label>
                    <select class="form-control form-control-lg" wire:model="product_id">
                      <option value="Elegir">-- Seleccione un Producto --</option>
                      @foreach ($products as $product)
                      	<option value="{{ $product->id }}">{{ $product->name }}</option>
                      @endforeach
                    </select>
				</div>
			</div>
			{{-- <div class="col-lg-5">
				<div class="form-group">
					<label for="stock"><strong>Cantidad</strong></label>
					<input type="text" wire:model="product_id" class="form-control" placeholder="Cantidad" >
					<div style="background-color: #f2f2f2;" class="border">
						<ul>
							<li class="mt-2 mb-2 ml-2"><a href="" class="block">{{$product_id}}</a></li>
							<li class="mt-2 mb-2 ml-2"><a href="" class="block">uno</a></li>
							<li class="mt-2 mb-2 ml-2"><a href="" class="block">uno</a></li>
							<li class="mt-2 mb-2 ml-2"><a href="" class="block">uno</a></li>
							
						</ul>
					</div>
				</div>
			</div> --}}
			<div class="col-lg-2">
				<div class="form-group">
					<label for="stock"><strong>Cantidad</strong></label>
					<input type="number" value="{{old('quantity')}}" wire:model="quantity"name="quantity" id="quantity" class="form-control" placeholder="Cantidad" >
				</div>
			</div>
			
			<div class="col-lg-2">
				<div class="form-group">
					<label for="stock"><strong>Precio de compra</strong></label>
					<input type="number" value="{{old('buy_price')}}" wire:model="buy_price" name="sell_price" id="sell_price" class="form-control" placeholder="Precio de venta" >
				</div>
			</div>
			<div class="col-lg-2">
				<div class="form-group">
					<label for="stock"><strong>Precio de Venta</strong></label>
					<input type="number" value="{{old('sell_price')}}" wire:model="sell_price" name="buy_price" id="buy_price" class="form-control" placeholder="Precio de compra" >
				</div>
			</div>
			<div class="col-lg-1">
				<div class="form-group">
					<button class="btn btn-primary float-right mt-4 ml-2 " wire:click.prevent="addProduct()">Agregar</button>
				</div>
			</div>
			
		</div>
		<div class="row">
              <div class="col-lg-12">
                  <div class="card px-2">
                      <div class="card-body">
                          <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table">
                                  <thead>
                                    <tr class="bg-dark text-white" wire:ignore>
                                        <th>#</th>
                                        <th>Descripción</th>
                                        <th class="text-right">Cantidad</th>
                                        <th class="text-right">Precio unitario</th>
                                        <th class="text-right">Precio de venta</th>
                                        <th class="text-right">SubTotal</th>
                                        <th class="text-right">Acciones</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  	@foreach ($orderProducts as $key => $product)
                                  		<tr class="text-right" wire:key="{{$key }}">
		                                    <td class="text-left">{{$key}}</td>
		                                    <td class="text-left">{{$product['name']}}</td>
		                                    <td>{{ $product['quantity'] }}</td>
		                                    <td>{{ $product['buy_price'] }}</td>
		                                    <td>{{ $product['sell_price'] }}</td>
		                                    <td>{{ $product['itemtotal']}}</td>
		                                    <td>
  
		                                    	<button class="btn btn-danger btn-sm" wire:click.prevent="removeItem({{$key}})">X</button>
		                                    </td>
	                                    </tr>
                                  	@endforeach
                                  </tbody>
                                </table>
                              </div>
                          </div>
                          <div class="container-fluid mt-5 w-100">
                            <p class="text-right mb-2">Sub - Total: ${{$subtotal}}</p>
                            <p class="text-right">Iva (12%) : ${{$taxiva}}</p>
                            <h4 class="text-right mb-5">Total : ${{$total}}</h4>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
		{{-- <div class="row">
			<div class="col-lg-12">
				<div class="card">
		            <div class="card-header">
		                Products
		            </div>

		            <div class="card-body">
		                
		            </div>
		        </div>
				
				<br />
				<div>
					<input class="btn btn-primary" type="submit" value="Save Order">
				</div>
				
				<div class="container-fluid mt-5 w-100">
					<p class="text-right mb-2">Sub - Total amount: $12,348</p>
					<p class="text-right">vat (10%) : $138</p>
					<h4 class="text-right mb-5">Total : $13,986</h4>
					<hr>
				</div>
				
				
				
			</div>
		</div> --}}
	</div>
	<div class="form-group mr-2 mt-4 float-right">
    <a href="{{ route('purchases.index') }}" class="btn btn-light">Regresar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>

</div>
