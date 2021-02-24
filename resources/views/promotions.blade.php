@extends('adminlte::page')

@section('title', 'Promociones')

<script src="../vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{$api_key}}"></script>
<script src="{{asset('js/lib/object.js')}}"></script>
<script src="{{asset('js/main/promotions.js')}}"></script>

<link href="{{asset('css/main/promotions.css')}}" rel="stylesheet">


<!-- initGui js -->
<script>$(document).ready(function(){window.promotions = new promotions({
    "data" : {
        "id"  : "{{old('id')}}",
        "tab" : "{{old('tab')}}",
        "status" : "{{old('status')}}",
        "token"  : "{{csrf_token()}}",
        "routes" : {
            "update" : "{{route('update-general')}}",
            "edit"   : "{{route('edit-promotion')}}"
            }
        }
	});
}); </script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="tab" role="tablist">
                        <li class="nav-item" role="presentation">
                        <a class="nav-link <?= $tab == 'general' ? 'active' : '' ?>" id="general-tab" data-toggle="pill" href="#general" role="tab" aria-controls="general" aria-selected="<?= $tab == 'general' ?: 'false'?>">General</a>
                        </li>
                        <li class="nav-item" role="presentation">
                        <a class="nav-link <?= $tab == 'conditions' ? 'active' : '' ?>" id="conditions-tab" data-toggle="pill" href="#conditions" role="tab" aria-controls="conditions" aria-selected="<?= $tab == 'conditions' ?: 'false'?>">Condiciones</a>
                        </li>
                        <li class="nav-item" role="presentation">
                        <a class="nav-link <?= $tab == 'items' ? 'active' : '' ?>" id="items-tab" data-toggle="pill" href="#items" role="tab" aria-controls="items" aria-selected="<?= $tab == 'items' ?: 'false'?>">Items</a>
                        </li>
                        <li class="nav-item" role="presentation">
                        <a class="nav-link <?= $tab == 'photos' ? 'active' : '' ?>" id="photos-tab" data-toggle="pill" href="#photos" role="tab" aria-controls="photos" aria-selected="<?= $tab == 'photos' ?: 'false'?>">Fotos</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                <div class="tab-content" id="tabContent">
                    <div class="tab-pane fade <?= $tab == 'general' ? 'show active' : '' ?>" id="general" role="tabpanel" aria-labelledby="general-tab">
                        <x-promotions.general/>
                    </div>
                    <div class="tab-pane fade <?= $tab == 'conditions' ? 'show active' : '' ?>" id="conditions" role="tabpanel" aria-labelledby="conditions-tab">
                        <x-promotions.conditions/>                    
                    </div>
                    <div class="tab-pane fade <?= $tab == 'items' ? 'show active' : '' ?>" id="items" role="tabpanel" aria-labelledby="items-tab">
                        <x-promotions.items/>
                    </div>
                    <div class="tab-pane fade <?= $tab == 'photos' ? 'show active' : '' ?>" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                        <x-promotions.photos/>
                    </div>
                </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>

<x-frames.modal/>
@endsection