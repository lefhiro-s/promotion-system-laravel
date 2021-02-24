<div class="container row">
  <div class="col-md-10">
      <h4 class="title-conditions">Lista de Fotos</h4> 
  </div>
  <div class="col-md-2 text-right">
      <button class="btn btn-primary create-data create-photos" value="photos">Agregar</button>
  </div>
</div>
<br>
<div class="container-table-photos">
  <table class="table photos-table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Promoción</th>
        <th scope="col">Url</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($photos as $photo)
        <tr>
          <td>{{$photo->id}}</td>
          <td>{{$photo->title_main}}</td>
          <td><a href="{{$photo->url}}">{{$photo->url}}</a></td>
          <td><button class="btn btn-warning edit-button edit-photos" onclick="promotions._editPhotos({{$photo->id}})">
            <i class="fa fa-edit"></i>Editar</button></td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<form class="form-horizontal form-photos" method="POST" style="display:none" action="{{route('storePhoto')}}">
    @csrf
      <input id="id" name="id" type="hidden" class="id_photos form-control" value="" />
      <input id="tab" name="tab" type="hidden" class="form-control" value="photos" />
      <div class="form-group row">
        <label class="text-right col-form-label col-md-2 col-sm-2 col-xs-12" for="id_promotion">Promoción</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select id="id_promotion" name="id_promotion" class="promotion_id_photos form-control @error('id_promotion') is-invalid @enderror">
              @foreach ($promotions as $promotion)
                <option {{ old('id_promotion') == $promotion->id ? 'selected' : '' }} value="{{$promotion->id}}">{{$promotion->title_main}}</option>
              @endforeach
            </select>
          @error('id_promotion')
              <span class="col-md-6 text-danger error-create-photos">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
          <label class="text-right col-form-label col-md-2 col-sm-2 col-xs-12" for="url">Url</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="url" name="url" type="text" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}">
              @error('url')
                  <span class="col-md-6 text-danger error-create-photos">{{ $message }}</span>
              @enderror
          </div>
      </div>
      <div class="form-group row">
          <div class="offset-md-2 col-md-6 col-sm-6 col-xs-12">              
            <button type="submit" class="btn btn-primary add-photos">Guardar</button>
            <button type="reset" class="btn btn-default back-list" value="photos">Volver</button>
          </div>
      </div>
</form>
