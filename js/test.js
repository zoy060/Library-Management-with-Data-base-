
let bookT = document.querySelector('.title');
let print = document.querySelector('#print');
let flow = document.querySelector('#float');
let update = document.querySelector('#update');
let fvalue = document.querySelector("#value");

let  up_value;

console.log(bookT);

flow.classList.add("float");
bookT.addEventListener("dblclick", function(){
    flow.style.opacity = 1;
    flow.style.pointerevents = "auto";
    flow.style.transform = 'scale(1)';
    flow.style.transition = 'all .5s ease';
    flow.style.transition = 'all .5s ease';
    document.querySelector(".body").style.filter = "blur(5px) grayscale(50%)";

    fvalue.value = bookT.innerHTML;

    update.addEventListener("click", function(){
        bookT.innerHTML = fvalue.value;
        flow.style.opacity = 0;
        document.querySelector(".body").style.filter = "none";
     })
    
})

 

 


