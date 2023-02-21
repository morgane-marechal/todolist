const tdlPlace = document.getElementById("displaytask");
const tdlButton = document.getElementById("task-button");
const taskButton = document.getElementById("task-button");




tdlButton.addEventListener("click", () => {
    fetch('task.php')
        .then(response => {
            console.log(response);
            return response.text();
        })
            .then((content) => {
                tdlPlace.innerHTML=content
        })
})

