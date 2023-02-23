const place = document.getElementById("inscription-place");
const connexionButton = document.getElementById("connexion-button");
const inscriptionButton = document.getElementById("inscription-button");
let isOk = document.getElementById("isOk");

inscriptionButton.addEventListener("click", () => {
    fetch('inscription.php')
        .then(response => {
            return response.text();
        })
        .then(form => {
            place.innerHTML = form;
            let submit = document.getElementById("submit");
            let registerForm = document.getElementById("inscription_form");
            submit.addEventListener("click", (e) => {
                e.preventDefault();
                fetch("inscription.php", {
                    method: "POST",
                    body: new FormData(registerForm)
                })
                    .then(response => {
                        //isOk.innerHTML="Bravo l'inscription a fonctionné";
                        return response.text();
                    })
                    .then((content) => {
                        place.innerHTML=content
                    })
            })
        })
}) 

connexionButton.addEventListener("click", () => {
    fetch('connexion.php')
        .then(response => {
            return response.text();
        })
        .then(form => {
            place.innerHTML = form;
            let submit = document.getElementById("submit");
            let connexionForm = document.getElementById("connexion_form");
            submit.addEventListener("click", (e) => {
                e.preventDefault();
                fetch("connexion.php", {
                    method: "POST",
                    body: new FormData(connexionForm)
                })
                    .then(response => {
                        return response.text();
                    })
                    .then((content) => {
                        place.innerHTML=content
                        //location.reload();
                    })
            })
        })
}) 

