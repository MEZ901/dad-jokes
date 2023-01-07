getJoke();
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

document.addEventListener("DOMContentLoaded", function(event) {
  document.getElementById('addJoke').click();
});

function getId(id){
  document.getElementById('id').value=`${id}`;
}