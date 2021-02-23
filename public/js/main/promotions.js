(function(thisContext) {

    var CLASS       = 'promotions';
    var PARENTCLASS = 'ObjAbstract';
    
    // Constructor
    thisContext[CLASS] = function promotions(args) {

        // Prepara la clase para heredar de su padre, recibiendo su prototipo
        if (Obj._new.call(this, PARENTCLASS, args) == 'inherited') {
            return 'inherited';
        }

        this._current_promotion = {};

        this._id = {};

        this._tab = {};

        this._routes = {};

        this._old = null;

        // Inicializacion
        if (typeof args == "undefined") {
            this._init();
        }else{
            this._init(args['data'] ? args['data'] : {},
                args['settings'] ? args['settings'] : {});
        }
    }

    // Hereda la clase padre
    Obj._inherite(CLASS, PARENTCLASS);

    // $.extend(thisContext[CLASS].prototype, {
    Obj._extendsnew(CLASS, {

        /**
         * Inicializa la interfaz del usuario
         *
         * @param {object} p Contiene las propiedades iniciales
         * @returns {void}
         */
        _init: function (p){
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

            $(".create-data").on('click',function(){
                var id = $(this).val();
                var name_tab = thisO._getNameTab(id);
                $('.container-table-'+id).fadeOut();
                $('.form-'+id).fadeIn();
                $('.create-'+id).fadeOut();
                $('.title-'+id).text('Crear ' + name_tab);
            });

            $(".back-list").off('click').on('click',function(){
                var id = $(this).val();
                $('.container-table-'+id).fadeIn();
                $('.form-'+id).fadeOut();
                $('.create-'+id).fadeIn();
                $('.title-'+id).text('Lista de Promociones');
            });

            thisO._returnEvents(thisO._tab);
        },

        _editPhotos : function(id){
            var thisO = this;

            $('html, body').animate({
                scrollTop: 0
            }, 1000);

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
        },

        _editConditions : function(id){
            var thisO = this;

            $('html, body').animate({
                scrollTop: 0
            }, 1000);
            
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
        },

        _editGeneral : function(id){
            var thisO = this;

            $('html, body').animate({
                scrollTop: 0
            }, 1000);
            
            $(".form-general").attr('action', this._routes['update']);
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
        },

        _editItems : function(id){
            var thisO = this;

            $('html, body').animate({
                scrollTop: 0
            }, 1000);
            
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
        },

        _returnEvents: function(dataTab){
            var thisO = this;
            var name = thisO._getNameTab(dataTab);
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
        },

        _getNameTab : function(codeTabe){
            var name_tab = "";
            switch (codeTabe) {
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

            return name_tab;
        }
    });

})(window.Obj._context);