/**
 * Fonction pour envoyer une requête AJAX
 * @param {*} url
 * @param {*} data 
 * @param {*} callback
 */
function AjaxRequest(url, data, callback = null) {
    var xhtml = new XMLHttpRequest();
    xhtml.open("POST", `${window.location.origin}/${url}`, true);
    xhtml.onreadystatechange = function () {
        if (xhtml.readyState === 4) {
            if (xhtml.status === 200) {
                try{
                    const Data = JSON.parse(xhtml.responseText);
                    if (typeof callback === 'function') {
                        callback(Data);
                    }
                }
                catch (error) {                
                    document.body.innerHTML += xhtml.responseText;
                }

            } else {
                console.error('Erreur: ' + xhtml.status);
            }
        }
    };

    xhtml.send(data);
}
/**
 * Fonction qui permet de fermer la popup d'information
 */
function closePopup() {
    const modal = document.getElementById("modal");
    if (modal) {
        modal.remove();
    }
}