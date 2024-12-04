// Fonction pour gérer les soumissions de formulaire
function handleFormSubmit(event) {
    event.preventDefault();

    const form = event.target;
    const entity = form.getAttribute('data-entity'); // Récupère l'entité depuis l'attribut data-entity
    const actionType = form.getAttribute('data-type-action');

    if (!actionType || !entity) return;

    let formData = new FormData(form);
    formData.append('ActionAjax', 'true');

    const url = `${entity.charAt(0).toUpperCase() + entity.slice(1)}`;

    const callback = actionType === 'info' ? null : (data) => handleAjaxResponse(data, actionType, entity);

    AjaxRequest(url, formData, callback);
}

// Fonction pour traiter les réponses AJAX
function handleAjaxResponse(data, actionType, entity) {
    closePopup();

    if (actionType === 'update') {
        document.getElementById(entity.toLowerCase() + data.id).innerHTML = data.html;
    } else if (actionType === 'delete') {
        document.getElementById(entity.toLowerCase() + data.id).remove();
    } else if (actionType === 'add') {
        document.getElementById('list' + entity + 's').innerHTML += data.html;
    }
}

// Initialisation des gestionnaires de formulaire
document.addEventListener("DOMContentLoaded", function() {
    document.addEventListener('submit', function(event) {
        if (event.target.classList.contains('ajaxForm')) {
            handleFormSubmit(event);
        }
    });
});
