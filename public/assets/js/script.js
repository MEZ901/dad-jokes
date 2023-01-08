async function getJoke() {
    const response = await fetch("https://icanhazdadjoke.com/", {
      headers: {
        Accept: "application/json",
      },
    });
  
    const data = await response.json();
    const joke = data.joke;
    const jokeParagraph = document.getElementById("random_jokes");
    jokeParagraph.textContent = joke;
}

if(document.getElementById("random_jokes") != null){
  getJoke();
}

document.addEventListener("DOMContentLoaded", function(event) {
  document.getElementById('addJoke').click();
  document.getElementById('deleteButton').click();
});

function getId(id){
  document.getElementById('id').value=`${id}`;
}

function add(){
  document.getElementById("modal_header").innerHTML = "Add joke";
  document.getElementById("joke").innerHTML = "";
  document.getElementById("add").innerHTML = "add";
  document.getElementById("add").name = "insert";
}

function edit(id, data){
  document.getElementById("modal_header").innerHTML = "Edit joke";
  document.getElementById("add").innerHTML = "update";
  document.getElementById("add").name = "update";
  document.getElementById("joke").innerHTML = `${data}`;
  document.getElementById("update_id").value = `${id}`;
}

function search(){
  let jokes_section = document.querySelectorAll(".jokes_section");
  let search = document.getElementById("search");

  if(search.value != ""){
    jokes_section.forEach(section => {
      let joke =  section.querySelector("#joke_content").innerHTML;
      if(joke.includes(search.value)){
        section.style.display="block";
      }else{
        section.style.display="none";
      }
    });
  }else{
    jokes_section.forEach(section => {
      section.style.display="block";
    });
  }
}