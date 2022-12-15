/* global $ */
(function () {

    $('#modalDelete').on('show.bs.modal', function (event) {
        let element = event.relatedTarget;
        let action = element.getAttribute('data-url');
        let nombre = element.dataset.nombre;
        let name = element.getAttribute('data-name');
        let form = document.getElementById('modalDeleteResourceForm');
        form.action = action;
        $('#deletePersona').text(name);
    });

})();