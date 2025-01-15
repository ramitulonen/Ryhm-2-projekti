function submitForm(event) {
    event.preventDefault();
    
    let formData = new FormData(event.target); // we can use this because we have put the input elements in a form element. Here we are the retrieving information from the html form

    fetch("insert.php", { // we have to define the method and body. The body will hold the actual data. 
        method : "POST",
        body : formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("information").innerText = data;
    })
    .catch(error => {
        document.getElementById("information").innerText = error;
    });
}

const texts = Array.from(document.getElementsByClassName("texts")); // or document.querySelectorAll(".texts");
texts.forEach(text => {
    text.addEventListener("click", () => {
        document.getElementById("information").innerText = "";
    });
});

/* In case we wanted to send data to a server without using forms we can do this:*/

// const dataToSend = {
//     name: "John",
//     age: 30,
//     city: "New York"
// };

// fetch('insert.php', {
//     method: 'POST',
//     headers: {
//         'Content-Type': 'application/json'  // Tell the server we're sending JSON data
//     },
//     body: JSON.stringify(dataToSend)  // Convert JavaScript object to JSON string
// })
// .then(response => response.json())  // Parse the JSON response from the server
// .then(data => console.log('Success:', data))
// .catch(error => console.error('Error:', error));


//On the php size:

// <?php
// // Get the JSON input
// $data = json_decode(file_get_contents('php://input'), true);  // Decode JSON string to array

// // Access the data
// $name = $data['name'];
// $age = $data['age'];
// $city = $data['city'];

// // For debugging, print the data
// echo "Name: $name, Age: $age, City: $city";
// ?>
