<div class="container row">
    <div class="col-md-10">
        <h4 class="title-conditions">Lista de Items</h4> 
    </div>
    <div class="col-md-2 text-right">
        <button class="btn btn-primary create-items">Agregar</button>
    </div>
</div>
<br>
<div class="container-table-items">
    <table class="table items-table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Item</th>
            <th scope="col">Promoción</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Pago Total</th>
            <th scope="col">Comision del sitio</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->title_main}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->total_sale}}</td>
            <td>{{$item->comission_site}}</td>
            <td><button class="btn btn-warning edit-button edit-items" value ="{{$item->id}}">
                <i class="fa fa-edit"></i>Editar</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<form class="form-horizontal form-items" method="POST" style="display:none" action="{{route('storeItem')}}">
    @csrf
        <input id="id" name="id" type="hidden" class="id_items form-control" value="" />
        <input id="tab" name="tab" type="hidden" class="form-control" value="items" />
        <div class="form-group row">
            <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="id_promotion">Promoción</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="id_promotion" name="id_promotion" class=" promotion_id_items form-control @error('id_promotion') is-invalid @enderror">
                    @foreach ($promotions as $promotion)
                        <option {{ old('id_promotion') == $promotion->id ? 'selected' : '' }} value="{{$promotion->id}}">{{$promotion->title_main}}</option>
                    @endforeach
                </select>
                @error('id_promotion')
                    <span class="col-md-6 text-danger error-create-items">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="title">Titulo</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title')
                    <span class="col-md-6 text-danger error-create-items">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="price">Precio</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="price" name="price" type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                @error('price')
                    <span class="col-md-6 text-danger error-create-items">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="quantity">Cantidad</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="quantity" name="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                @error('quantity')
                    <span class="col-md-6 text-danger error-create-items">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="total_pay">Pago total</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="total_pay" name="total_pay" type="number" class="form-control @error('total_pay') is-invalid @enderror" value="{{ old('total_pay') }}">
                @error('total_pay')
                    <span class="col-md-6 text-danger error-create-items">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="comission_site">Comisión del sitio</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="comission_site" name="comission_site" type="number" class="form-control @error('comission_site') is-invalid @enderror" value="{{ old('comission_site') }}">
                @error('comission_site')
                    <span class="col-md-6 text-danger error-create-items">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-md-3 col-md-6 col-sm-6 col-xs-12">
                <button type="submit" class="btn btn-primary add-items">Guardar</button>
                <button type="reset" class="btn btn-default back-list-items">Volver</button>
            </div>
        </div>
</form>