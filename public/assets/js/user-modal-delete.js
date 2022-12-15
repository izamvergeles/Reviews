/* global $ */
(function () {

    $('#modalDelete').on('show.bs.modal', function (event) {
        let element = event.relatedTarget;
        let action = element.getAttribute('data-url');
        let name = element.getAttribute('data-name');
        let email = element.getAttribute('data-email');
        let form = document.getElementById('modalDeleteResourceForm');
        form.action = action;
        $('#deletePersona').text(name);
        $('#deleteEmail').text(email);
    });

})();