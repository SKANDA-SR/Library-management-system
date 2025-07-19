// Load books on page load
window.addEventListener("DOMContentLoaded", () => {
    fetch("get_books.php")
        .then(response => response.json())
        .then(books => {
            books.forEach(book => addBookToTable(book));
        })
        .catch(err => console.error("Failed to load books:", err));
});

// Handle form submission
document.getElementById("bookForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("add_book.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert("Error: " + data.error);
        } else {
            addBookToTable(data);
            this.reset();
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
});

// Add row to table
function addBookToTable(book) {
    const tbody = document.querySelector("#booksTable tbody");
    const row = document.createElement("tr");

    row.innerHTML = `
        <td>${book.title}</td>
        <td>${book.author}</td>
        <td>${book.published_year}</td>
        <td><button onclick="deleteBook(this)">Delete</button></td>
    `;

    tbody.appendChild(row);
}

// Dummy delete function (frontend only)
function deleteBook(btn) {
    const row = btn.closest("tr");
    row.remove();
}
