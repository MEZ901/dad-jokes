async function getJoke() {
    // Make the GET request to the API
    const response = await fetch("https://icanhazdadjoke.com/", {
      headers: {
        Accept: "application/json",
      },
    });
  
    // Parse the response as JSON
    const data = await response.json();
    
    // Get the joke from the response
    const joke = data.joke;
  
    // Get the paragraph element to display the joke
    const jokeParagraph = document.getElementById("random_jokes");
  
    // Set the joke as the text content of the paragraph element
    jokeParagraph.textContent = joke;
}
getJoke()
  