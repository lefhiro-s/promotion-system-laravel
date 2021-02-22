    <div class="container row">
        <div class="col-md-10">
            <h4 class="title-general">Lista de Promociones</h4> 
        </div>
        <div class="col-md-2 text-right">
            <button class="btn btn-primary create-general">Agregar</button>
        </div>
    </div>
    <br>
    <div class="container-table-general">
        <table class="table promotion-table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($promotions as $promotion)
                <tr>
                <td>{{$promotion->id}}</td>
                <td>{{$promotion->title_main}}</td>
                <td>{!! $promotion->description!!}</td>
                <td><button class="btn btn-warning edit-button edit-general" value ="{{$promotion->id}}"><i class="fa fa-edit"></i>Editar</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <form class="form-horizontal form-general" method="POST" style="display:none" action='{{route('storePromotion')}}'>
        @csrf
            <input id="tab" name="tab" type="hidden" class="form-control" value="general" />
            <div class="form-group row">
                <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="Título principal">Título principal</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="title_main" name="title_main" type="text" class="form-control @error('title_main') is-invalid @enderror" value="{{ old('title_main') }}">
                    @error('title_main')
                        <span class="col-md-6 text-danger">{{$message}}</span>
                    @enderror
                </div>
                
            </div>
            <div class="form-group row" hidden="true">
                <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="id">id</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input class="promotion_id" id="id" name="id" type="text"  value="{{ old('id') }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="title_long">Título largo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="title_long" name="title_long" type="text" class="form-control @error('title_long') is-invalid @enderror" value="{{old('title_long')}}">
                    @error('title_long')
                        <span class="col-md-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="title_short">Título corto</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="title_short" name="title_short" type="text" class="form-control @error('title_short') is-invalid @enderror" value="{{old('title_short')}}">
                    @error('title_short')
                        <span class="col-md-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="description">Descripción</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea id="description" name="description" type="text" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                    @error('description')
                        <span class="col-md-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="latitud">Latitud y Longitud</label>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <button type="button" class="btn btn-primary" id="search_location">Buscar</button>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <input id="latitude" name="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" value="{{ old('latitude') }}">
                    @error('latitude')
                        <span class="col-md-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <input id="longitude" name="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" value="{{ old('longitude') }}">
                    @error('longitude')
                        <span class="col-md-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="city">Ciudad</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="city" name="city" type="text" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}">
                    @error('city')
                        <span class="col-md-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="end_time">Fecha de finalización</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="end_time" name="end_time" type="date" class="form-control @error('end_time') is-invalid @enderror" value="{{ old('end_time') }}">
                    @error('end_time')
                        <span class="col-md-6 text-danger error-create-general">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="status">Estado</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                        <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Activo</option>
                        <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Desactivo</option>
                    </select>
                    @error('status')
                        <span class="col-md-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="type">Tipo</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="type" name="type" type="text" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}">
                    @error('type')
                        <span class="col-md-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="discount">Descuento</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="discount" name="discount" type="text" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount') }}">
                    @error('discount')
                        <span class="col-md-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="text-right col-form-label col-md-3 col-sm-3 col-xs-12" for="contact_info">Información de contacto</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="contact_info" name="contact_info" type="text" class="form-control @error('contact_info') is-invalid @enderror" value="{{ old('contact_info') }}">
                    @error('contact_info')
                    <span class="col-md-6 text-danger error-create-general">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-md-3 col-md-6 col-sm-6 col-xs-12">
                    <button type="submit" class="btn btn-primary add-general">Guardar</button>
                    <button type="reset" class="btn btn-default back-list-general" id="back-general">Volver</button>
                </div>
            </div>
    </form>