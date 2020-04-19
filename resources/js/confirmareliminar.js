const confirmarEliminar = new Vue({
    el: '#confirmarEliminar',
    data:{
        urlaeliminar: '',
    },
    methods: {
        deseas_eliminar(id){
            // alert(id);
            this.urlaeliminar = document.getElementById('urlbase').innerHTML + '/' + id;
            $('#modal_eliminar').modal('show');
        }
    }
});
