let offset = 0; // Initialize the offset
const size = 50; // Set the number of rows per request

// Function to fetch data from the PHP file and update the table
function fetchData() {
    // Make an HTTP request to fetch data with the current offset
    // The fetch function returns a promise. Learn more about asynchronous code and promises at:
    // 1) https://www.youtube.com/watch?v=QSqc6MMS6Fk&list=WL&index=33
    // 2) https://www.youtube.com/watch?v=TnhCX0KkPqs&list=WL&index=34
    // 3) https://www.youtube.com/watch?v=spvYqO_Kp9Q&list=WL&index=52
    //In our case we are using the tecnhique from video 2. 
    fetch(`retrieve.php?offset=${offset}&size=${size}`) // stop reading here and go immediately to retrieve.php file. Then come back here.
    .then(response => response.text()) // Get the response as text (HTML)
    .then(data => {
        const tableContainer = document.getElementById("tableContainer");

        // Update the table container with the new data
        tableContainer.innerHTML = data;

        //if the table too big, after you pressed one of the buttons we had to scroll up. Howewer this is getting handle automatically
        tableContainer.scrollIntoView({
            behavior : "smooth", // Smooth scrolling
            block : "start" // Aligns the element at the top of the page (Better explanation, move the screen upwards until the top of the element is being displayed)
        });
    })
    .catch(error => {
        console.error("Error fetching data: " + error);
    });
}

//when the page is loaded, then the function will be executed
document.addEventListener("DOMContentLoaded", () => {
    fetchData(); // this is called the moment we are loading the page
})

// Add click event for the "Next" button
document.getElementById("nextButton").addEventListener("click", function() {
    offset += size; // Increment the offset by the number of rows to fetch
    fetchData(); // Fetch the next set of rows
})

// Add click event for the "Previous" button
document.getElementById("previousButton").addEventListener("click", () => {
    offset -= size; // Decrement the offset by the number of rows to fetch
    fetchData(); // Fetch the previous set of rows
})

//function() {} and () => {} are the same. The second one is called lambda expression.
//Learn more about lambda expressions (in javascript these are called arrow functions) at https://www.youtube.com/watch?v=fRRRkognpOs