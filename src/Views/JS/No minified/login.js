document.addEventListener("DOMContentLoaded", function() {
    document.addEventListener('submit', function(event) {
        // Vérifie que l'événement provient bien du formulaire `ajaxForm`
        if (event.target && event.target.id === 'ajaxForm') {
            event.preventDefault();

            let formData = new FormData(event.target);
            formData.append('ActionAjax', 'true');

            AjaxRequest("Login", formData, redirict);
        }
    });
});

function redirict(Data) {
    if (Data && Data.Link) {
        window.location.href = Data.Link;
    } else {
        console.error("Lien de redirection manquant.");
    }
}
