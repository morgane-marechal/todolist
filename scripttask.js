const tdlPlace = document.getElementById("displaytask");
const tdlButton = document.getElementById("task-button");
const addTask = document.getElementById("addtask");

const submitTask = document.getElementById("submit-task");
const taskForm = document.getElementById("task_form");



            taskForm.addEventListener("submit", (e) => {
                e.preventDefault();
                let formData=new FormData(taskForm);
                fetch("todolist.php", {
                    method: "POST",
                    body: formData,
                })
                    .then((response) => {
                        if(response.ok){
                            return response.text();
                        }
                    })
            });



            taskForm.addEventListener("submit", (e) => {
                e.preventDefault();
                fetch('task.php')
                    .then(response => {
                        //console.log(response);
                        return response.text();
                    })
                        .then((content) => {
                            tdlPlace.innerHTML=content
                    })
            })

/*
            tdlButton.addEventListener("click", () => {
                fetch('task.php')
                    .then(response => {
                        //console.log(response);
                        return response.text();
                    })
                        .then((content) => {
                            tdlPlace.innerHTML=content
                    })
            }) */

//------------- pour delete avec GET -----------------------

let allDel=document.querySelectorAll('.del');
let btnTest=document.getElementsByClassName(".del");

//function myFunction(){
    //console.log("allDel: "+allDel.length);
    for (const btn of allDel){
        btn.addEventListener("click", (e) =>{
           // e.preventDefault();
            let idTask= e.target.id
            console.log("hello  "+idTask)
            deleteMe(idTask);
        })
    }
//}   

async function deleteMe(idTask){
    await fetch(`todolist.php?delete=${idTask}`)
    .then((resp)=> {
        console.log(resp)
        return resp.text();
    })
}

//------------- pour update avec GET -----------------------
let allUpdate=document.querySelectorAll('.done');


    for (const btn of allUpdate){
        btn.addEventListener("click", (e) =>{
           // e.preventDefault();
            let idTask= e.target.id
            console.log("hello  "+idTask)
            done(idTask);
        })
    }

    async function done(idTask){
        await fetch(`todolist.php?update=${idTask}`)
        .then((resp)=> {
            console.log(resp)
            return resp.text();
        })
    }