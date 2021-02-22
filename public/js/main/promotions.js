var promotions = {

    _current_promotion : {},

    _id : {},

    _tab : {},

    _routes : {},

    _old : null,

    /**
     * Inicializa la interfaz del usuario
     *
     * @param {object} p Contiene las propiedades iniciales
     * @returns {void}
     */
    initGUI: function (p){
        thisO = this;
        thisO._initConfig();
        thisO._initData(p);
        thisO._initEvents();
    },

    _initConfig: function(){
        var thisO = this;
    },

    _initData: function(data){
        var thisO = this;
        thisO._id     = data.id;
        thisO._tab    = data.tab;
        thisO._routes = data.routes;
        thisO._status = data.status;
        thisO._old    = data.old;
   },

    _initEvents: function(){
        var thisO = this;

        if($.isEmptyObject(thisO._old) && thisO._status == 200){
            $(document).Toasts('create', {
                title: 'Exito!',
                body: 'Se han guardado los datos exitosamente',
                autohide: true,
                class: 'bg-success'
              })
        }

        $(".promotion-table, .conditions-table, .items-table, .photos-table").dataTable({
            "language": {
                "lengthMenu"     : "Mostrando _MENU_ registros por pagina",
                "emptyTable"     : "No hay datos disponibles en la tabla",
                "zeroRecords"    : "No se han encontrado registros",
                "info"           : "Mostrando del _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty"      : "Mostrando 0 a 0 de 0 entradas",
                "infoFiltered"   : "(filtrado de _MAX_ registros totales)",
                "sSearch"        : "Buscar",
                "loadingRecords" : "Cargando...",
                "Processing"     : "Procesando...",
                "paginate": {
                    "first"     : "Primero",
                    "last"      : "Ultimo",
                    "next"      : "Siguiente",
                    "previous"  : "Anterior"
                }
            }
        });

        $("#description, #description_conditions").summernote({
            "toolbar": [
                ['font', 
                    ['bold', 'italic','underline', 'clear']
                ]
            ]
        });

        $(".create-general").on('click',function(){
            $('.container-table-general').fadeOut();
            $('.form-general').fadeIn();
            $('.create-general').fadeOut();
            $('.title-general').text('Crear Promoción');
        });

        $(".back-list-general").off('click').on('click',function(){
            $('.container-table-general').fadeIn();
            $('.form-general').fadeOut();
            $('.create-general').fadeIn();
            $('.title-general').text('Lista de Promociones');
        });

        $('.add-general, .edit-general').on('click',function(){
            var id = $(this).val();
            if (id == "") {
                $('.title-general').text('Crear Promoción');
            }else {
                $(".form-general").attr('action', thisO._routes['update']);
                $('.title-general').text('Editar Promoción');
                $('.container-table-general').fadeOut();
                $('.form-general').fadeIn();
                $('.create-general').fadeOut();
                $(".is-invalid").removeClass("is-invalid");
                $(".error-create-general").remove();

                $.ajax({
                    type:'GET',
                    url: thisO._routes['edit'],
                    data: { idp: id,
                    _token: $('input[name="_token"]').val()},
                    success:function(response){
                        var promotions  = response.promotions;
                        var end_time = new Date(promotions.end_time);
                        $("#title_main").val(promotions.title_main);
                        $("#title_long").val(promotions.title_long);
                        $("#title_short").val(promotions.title_short);
                        $("#description").summernote("code", promotions.description);
                        $("#latitude").val(promotions.latitude);
                        $("#longitude").val(promotions.longitude);
                        $("#city").val(promotions.city);
                        $("#end_time").val(promotions.end_time);
                        $("#status").val(promotions.status);
                        $("#type").val(promotions.type);
                        $("#discount").val(promotions.discount);
                        $("#contact_info").val(promotions.contact_info);
                        $(".promotion_id").val(promotions.id);
                    }
                });
            }
        });

        $(".create-conditions").on('click',function(){
            $('.container-table-conditions').fadeOut();
            $('.form-conditions').fadeIn();
            $('.create-conditions').fadeOut();
            $('.title-conditions').text('Crear Condición');
        });

        $(".back-list-conditions").off('click').on('click',function(){
            $('.container-table-conditions').fadeIn();
            $('.form-conditions').fadeOut();
            $('.create-conditions').fadeIn();
            $('.title-conditions').text('Lista de Promociones');
        });

        $('.add-conditions, .edit-conditions').on('click',function(){
            var id = $(this).val();
            if (id == "") {
                $('.title-conditions').text('Crear Condición');
            }else {
                $(".form-conditions").attr('action', '/update-conditions');
                $('.title-conditions').text('Editar Condición');
                $('.container-table-conditions').fadeOut();
                $('.form-conditions').fadeIn();
                $('.create-conditions').fadeOut();
                $(".is-invalid").removeClass("is-invalid");
                $(".error-create-conditions").remove();

                $.ajax({
                    type:'GET',
                    url: '/edit-conditions',
                    data: { idp: id,
                    _token: $('input[name="_token"]').val()},
                    success:function(response){
                        var conditions  = response.conditions;
                        $(".promotion_id_condition").val(conditions.id_promotion);
                        $("#description_conditions").summernote("code", conditions.description);
                        $(".id_conditions").val(conditions.id);
                    }
                });
            }
        });

        $(".create-conditions").on('click',function(){
            $('.container-table-conditions').fadeOut();
            $('.form-conditions').fadeIn();
            $('.create-conditions').fadeOut();
            $('.title-conditions').text('Crear Condición');
        });

        $(".back-list-conditions").off('click').on('click',function(){
            $('.container-table-conditions').fadeIn();
            $('.form-conditions').fadeOut();
            $('.create-conditions').fadeIn();
            $('.title-conditions').text('Lista de Promociones');
        });

        $('.add-conditions, .edit-conditions').on('click',function(){
            var id = $(this).val();
            if (id == "") {
                $('.title-conditions').text('Crear Condición');
            }else {
                $(".form-conditions").attr('action', '/update-conditions');
                $('.title-conditions').text('Editar Condición');
                $('.container-table-conditions').fadeOut();
                $('.form-conditions').fadeIn();
                $('.create-conditions').fadeOut();
                $(".is-invalid").removeClass("is-invalid");
                $(".error-create-conditions").remove();

                $.ajax({
                    type:'GET',
                    url: '/edit-conditions',
                    data: { idp: id,
                    _token: $('input[name="_token"]').val()},
                    success:function(response){
                        var conditions  = response.conditions;
                        $(".promotion_id_condition").val(conditions.id_promotion);
                        $("#description_conditions").summernote("code", conditions.description);
                        $(".id_conditions").val(conditions.id);
                    }
                });
            }
        });

        $(".create-photos").on('click',function(){
            $('.container-table-photos').fadeOut();
            $('.form-photos').fadeIn();
            $('.create-photos').fadeOut();
            $('.title-photos').text('Crear Condición');
        });

        $(".back-list-photos").off('click').on('click',function(){
            $('.container-table-photos').fadeIn();
            $('.form-photos').fadeOut();
            $('.create-photos').fadeIn();
            $('.title-photos').text('Lista de Promociones');
        });

        $('.add-photos, .edit-photos').on('click',function(){
            var id = $(this).val();
            if (id == "") {
                $('.title-photos').text('Crear Condición');
            }else {
                $(".form-photos").attr('action', '/update-photos');
                $('.title-photos').text('Editar Condición');
                $('.container-table-photos').fadeOut();
                $('.form-photos').fadeIn();
                $('.create-photos').fadeOut();
                $(".is-invalid").removeClass("is-invalid");
                $(".error-create-photos").remove();

                $.ajax({
                    type:'GET',
                    url: '/edit-photos',
                    data: { idp: id,
                    _token: $('input[name="_token"]').val()},
                    success:function(response){
                        var photos  = response.photos;
                        $(".promotion_id_photos").val(photos.id_promotion);
                        $("#url").val(photos.url);
                        $(".id_photos").val(photos.id);
                    }
                });
            }
        });

        $(".create-items").on('click',function(){
            $('.container-table-items').fadeOut();
            $('.form-items').fadeIn();
            $('.create-items').fadeOut();
            $('.title-items').text('Crear Condición');
        });

        $(".back-list-items").off('click').on('click',function(){
            $('.container-table-items').fadeIn();
            $('.form-items').fadeOut();
            $('.create-items').fadeIn();
            $('.title-items').text('Lista de Promociones');
        });

        $('.add-items, .edit-items').on('click',function(){
            var id = $(this).val();
            if (id == "") {
                $('.title-items').text('Crear Condición');
            }else {
                $(".form-items").attr('action', '/update-items');
                $('.title-items').text('Editar Condición');
                $('.container-table-items').fadeOut();
                $('.form-items').fadeIn();
                $('.create-items').fadeOut();
                $(".is-invalid").removeClass("is-invalid");
                $(".error-create-items").remove();

                $.ajax({
                    type:'GET',
                    url: '/edit-items',
                    data: { idp: id,
                    _token: $('input[name="_token"]').val()},
                    success:function(response){
                        var items  = response.items;
                        $(".id_items").val(items.id);
                        $(".promotion_id_items").val(items.id_promotion);
                        $("#title").val(items.title);
                        $("#price").val(items.price);
                        $("#quantity").val(items.quantity);
                        $("#total_pay").val(items.total_pay);
                        $("#comission_site").val(items.comission_site);
                    }
                });
            }
        });
        
        var name_tab = {}
        switch (thisO._tab) {
            case 'general':
                name_tab = "Promoción";
                break;
            case 'conditions':
                name_tab = "Condición";
                break;
            case 'items':
                name_tab = "Items";
                break;
            case 'photos':
                name_tab = "Fotos";
                break;
            default:
                break;
        }

        thisO._returnEvents(thisO._tab, name_tab);
    },

    _returnEvents: function(dataTab, name){
        var thisO = this;
        console.log(dataTab);
        $("#"+dataTab+"-tab").trigger( "click" );
        if($('.error-create-'+dataTab).length){
            $('.container-table-'+dataTab).fadeOut();
            $('.form-'+dataTab).fadeIn();
            $('.create-'+dataTab).fadeOut();

            if (!thisO._promotion_id){
                $('.title-'+dataTab).text('Crear ' + name);
            }else{
                $('.form-'+dataTab).attr('action', '/update-'+dataTab);
                $('.title-'+dataTab).text('Editar ' + name);
            }
        }
    }
}

dexport(promotions, 'initGUI');
function dexport(object, method){
    window[method] = function(){return object[method].apply(object, arguments);};
};