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
                            updateEvent();
                            deleteEvent();
                    })
            })

            


            function fetchDisplay(){
                
                //e.preventDefault();
                fetch('task.php')
                    .then(response => {
                        //console.log(response);
                        return response.text();
                    })
                        .then((content) => {
                            tdlPlace.innerHTML=content
                            updateEvent();
                            deleteEvent();
                    })
            }
            /*
            taskForm.addEventListener("submit", (e) => {
            fetchDisplay();
            })
            */
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

    //console.log("allDel: "+allDel.length);
    for (const btn of allDel){
        btn.addEventListener("click", (e) =>{
           // e.preventDefault();
            let idTask= e.target.id
            console.log("delete  "+idTask)
            deleteMe(idTask);
            fetchDisplay();
           // window.location.reload();
        })
    }

    function deleteEvent(){
        let allDel=document.querySelectorAll('.del');
        let btnTest=document.getElementsByClassName(".del");

    //console.log("allDel: "+allDel.length);
        for (const btn of allDel){
            btn.addEventListener("click", (e) =>{
            // e.preventDefault();
                let idTask= e.target.id
                console.log("delete  "+idTask)
                deleteMe(idTask);
                fetchDisplay();
            // window.location.reload();
            })
        }

    }
   

async function deleteMe(idTask){
    await fetch(`todolist.php?delete=${idTask}`)
    .then((resp)=> {
        console.log("reponse deleteMe "+resp)
        return resp.text();
    })
}

//------------- pour update avec GET -----------------------
function updateEvent(){
    let allUpdate=document.querySelectorAll('.done');


    for (const btn2 of allUpdate){
        btn2.addEventListener("click", (e) =>{
            e.preventDefault();
            let idTask= e.target.id
            //console.log("update  "+idTask)
            done(idTask);
            fetchDisplay();
           // window.location.reload();
        })
    }

}



let allUpdate=document.querySelectorAll('.done');


    for (const btn2 of allUpdate){
        btn2.addEventListener("click", (e) =>{
            e.preventDefault();
            let idTask= e.target.id
            //console.log("update  "+idTask)
            done(idTask);
            fetchDisplay();
           // window.location.reload();
        })
    }

    async function done(idTask){
        await fetch(`todolist.php?update=${idTask}`)
        .then((resp)=> {
            console.log("reponse update "+resp)          
            return resp.text();
        })

    }

