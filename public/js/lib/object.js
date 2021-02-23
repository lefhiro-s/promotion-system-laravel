/**
 * Groovy Abstract para manejar objetos clase en JavaScript
 *
 * Permite realizar operaciones de herencia para objetos, llamadas a metodos de los padres,
 * mantiene encapsulamiento, abstraccion y polimorfismo
 *
 * TODO: Adicionalmente, simula los tipos de visibilidades de metodos y propiedades (public, protected y private)
 * y simula parte de la funcionalidad de interfaces, permitiendo expresar que algunos metodos necesiten
 * implementacion
 *
 *
 * Basado en los docs de MDN, entre ellos:
 * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Introduction_to_Object-Oriented_JavaScript
 * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Inheritance_Revisited
 * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions_and_function_scope
 *
 *
 * Notas importantes:
 *   - Los tipos de visibilidad de metodos y propiedades se identifican de la siguiente manera
 *     - protected: aquellas funciones o propiedades que empiecen con '_'
 *     - private  : aquellas funciones o propiedades que empiecen con '$_'
 *     - public   : cualquier funcion o propiedades que no empiece con los casos prefijos antes mencionados
 *
 *   - El accesor 'protected' se extiende en multiples niveles de herencia sin ningun problema
 *
 *   - Para forzar a que una funcion sea implementeda se debe colocar <code>this._needsImplementation();</code>
 *     en su cuerpo y para identificarla se debe colocar un comentario con el tag '@toImplement'
 *
 *   - Aquellos metodos o propiedades que se quieran indicar que deben ser reemplazados se les debe
 *     colocar el tag '@toReplace' en sus comentarios
 */
(function() {


/**
 * Pass in the objects to merge as arguments.
 * For a deep extend, set the first argument to `true`.
 *
 * TODO mejorar para que sea recursiva
 *
 * @see https://gomakethings.com/vanilla-javascript-version-of-jquery-extend/
 *
 * @param {Object} objToExtend
 * @param {Object} objParent
 *
 * @return void
 */
window.objectExtends = function(objToExtend, objParent) {
    for ( var prop in objParent ) {
        if ( Object.prototype.hasOwnProperty.call( objParent, prop ) ) {
            // deep merge and property is an object, merge properties
            if ( Object.prototype.toString.call(objParent[prop]) === '[object Object]' ) {
                objToExtend[prop] = this._extendsnew( objToExtend[prop], objParent[prop] );
            } else {
                objToExtend[prop] = objParent[prop];
            }
        }
    }
    return;
}


// Definicion del abstract para objetos
window['ObjAbstract'] = function ObjAbstract() {};

// Contexto en que estaran los objetos que hereden de este abstract
var ObjContext = window;


// Extiende la funcionalidad del abstract
$.extend(window.ObjAbstract.prototype, {

    /**
     * Nombre de la clase
     *
     * @toReplace
     *
     * @var string
     */
    _class : 'ObjAbstract',


    /**
     * Clase padre
     *
     * Contiene el prototipo de la clase padre (ninguno para ObjAbstract)
     *
     * @toReplace
     *
     * @var Object
     */
    _parentClass : undefined,


    /**
     * Contexto en que el que estaran los objetos
     * que hereden de este abstract
     *
     * @var Object
     */
    _context : ObjContext,


    /**
     * Wrapper para instanciar nuevas clases y prepararlas para heredar al padre
     *
     * Llamando al padre, esta clase (y subclases que hereden) reciben el prototipo del padre
     *
     * @param string         parentClass   Nombre de la clase padre
     * @param string | Array args          Argumentos para el constructor de la clase padre
     *
     * @return string                      Diferencia si la llamada a la clase fue para heredar de ella o no
     */
    _new : function(parentClass, args) {

        // Determina el contexto donde se encuentra el padre
        parentContext = 'ObjAbstract' == parentClass ? window : window.ObjAbstract.prototype._context;

        // Prepara argumentos para el padre y realiza la llamada al constructor del mismos
        parentArgs = Object.prototype.toString.call(args) == '[object Array]' ? args : [args];
        parentContext[parentClass].apply(this, parentArgs);

        return args == 'extends' ? 'inherited' : '';
    },


    /**
     * Extiende un objeto a partir de otro, la extención no es recursiva, solo se aplica
     * el primer nivel, en caso de propiedades o métodos con el mismo nombre, se conservan
     * los del objeto hijo (aquel que se está extendiendo)
     *
     * @param string objToExtend    Nombre de la clase hija o la clase a extender, todas las
     *                              propiedades de esta clase conservan y se agregan la de la
     *                              clase padre
     * @param string objParent      Nombre de la clase padre, clase que se toma como base, las
     *                              propedades de esta serán sobreescritas en caso de conflicto
     *                              con los nombres
     *
     * @return void
     */
    _extends : function(objToExtend, objParent) {
        parentContext       = 'ObjAbstract' == objParent
                                ? window : window.ObjAbstract.prototype._context;
        extendedContext     = 'ObjAbstract' == objToExtend
                                ? window : window.ObjAbstract.prototype._context;

        for (var key in parentContext[objParent]) {
            if (parentContext[objParent].hasOwnProperty(key)
                && !extendedContext[objToExtend].hasOwnProperty(key)){
                extendedContext[objToExtend][key] = parentContext[objParent][key];
            }
        }
        return;
    },


    /**
     *  Pass in the objects to merge as arguments.
     *  For a deep extend, set the first argument to `true`.
     *
     * @param string objToExtend    Nombre de la clase hija o la clase a extender, todas las
     *                              propiedades de esta clase conservan y se agregan la de la
     *                              clase padre
     * @param string objParent      Nombre de la clase padre, clase que se toma como base, las
     *                              propedades de esta serán sobreescritas en caso de conflicto
     *                              con los nombres
     *
     * @return void
     */
    _extendsnew : function(objToExtend, objParent) {
        parentContext       = 'ObjAbstract' == objParent
                                ? window : window.ObjAbstract.prototype._context;
        extendedContext     = 'ObjAbstract' == objToExtend
                                ? window : window.ObjAbstract.prototype._context;
        objParent           = typeof objParent == 'object' ?
                                objParent : parentContext[objParent];
        objToExtend         = typeof objToExtend == 'object' ?
                                objToExtend : parentContext[objToExtend].prototype;
        for ( var prop in objParent ) {
            if ( Object.prototype.hasOwnProperty.call( objParent, prop ) ) {
                // deep merge and property is an object, merge properties
                if ( Object.prototype.toString.call(objParent[prop]) === '[object Object]' ) {
                    objToExtend[prop] = this._extendsnew( objToExtend[prop], objParent[prop] );
                } else {
                    objToExtend[prop] = objParent[prop];
                }
            }
        }
        return ;
    },


    /**
     * Aplica la herencia de una clase (padre) a otra (hija)
     *
     * @param string childClass    Nombre de la clase hija
     * @param string parentClass   Nombre de la clase padre
     *
     * @return void
     */
    _inherite : function(childClass, parentClass) {

        // Determina los contextos donde se encuentran las clases
        parentContext = 'ObjAbstract' == parentClass ? window : window.ObjAbstract.prototype._context;
        childContext  = window.ObjAbstract.prototype._context;

        // Hereda el prototipo e instancia de la clase padre y corrige el constructor
        // de la clase hija para que apunte a si misma
        childContext[childClass].prototype = new parentContext[parentClass]('extends');
        childContext[childClass].prototype.constructor = childContext[childClass];
        //delete chilContext[childClass].prototype._new;

        //console.log('inheriting ~'+ parentClass +'~ to ~'+ childClass +'~');
    },


    /**
     * Invoca una llamada a un metodo del padre
     *
     * @param Object thisInstance   Instancia de la clase que desea pasarse como contexto al padre
     * @param string method         Nombre del metodo definido en la clase padre
     * @param mixed  args           Argumentos de dicho metodo. Si son varios deben venir en un array
     *
     * @return mixed                Retorna el resultado del metodo al que se esta llamando
     */
    _parent : function(thisInstance, method, args) {
        //console.log(this, this._class, parent', this._parentClass);
        //console.log('thisInstance', thisInstance, 'class', thisInstance._class);

        // Si la clase no tiene padre, retorna void
        if (typeof window.ObjAbstract.prototype._context[this._class].prototype._parentClass == 'undefined') {
            return;
        }

        if (typeof window.ObjAbstract.prototype._context[this._class].prototype._parentClass[method] == 'function') {

            // Prepara argumentos en formato apropiado
            if (Object.prototype.toString.call(args) != '[object Array]') {
                args = [args];
            }

            // Realiza la llamada al metodo del padre
            return window.ObjAbstract.prototype._context[this._class]
                        .prototype._parentClass[method].apply(thisInstance, args);
        }
    },


    /**
     * Permite simular la necesidad de una funcion para que sea
     * definida por un hijo que este heredando
     *
     * @return Error
     */
    _needsImplementation : function() {
        msg = 'Error: este metodo debe ser definido';
        console.error(msg);
        throw new Error(msg);
    },


    /**
     * Permite simular un error cuando un objeto que hereda intenta
     * acceder a un metodo privado
     *
     * @return Error
     */
    _needsPrivilegues : function() {
        msg = 'Error: se esta intentando acceder a un metodo privado';
        console.error(msg);
        throw new Error(msg);
    }
});


// Instancia global para acceso a
// funcionalidades de este abstract
window['Obj'] = new window['ObjAbstract']();
window.Obj.prototype = window.ObjAbstract.prototype;


})();