const tbody = document.querySelector("#body");

// Create an instance of a db object for us to store the open database in
let db;
// Open our database
const openRequest = window.indexedDB.open("cart_db", 1);
// error handler signifies that the database didn't open successfully
openRequest.addEventListener("error", () =>
  console.error("Database failed to open")
);

// success handler signifies that the database opened successfully
openRequest.addEventListener("success", () => {
  console.log("Database opened successfully");

  // Store the opened database object in the db variable. This is used a lot below
  db = openRequest.result;

  // Run the displayData() function to display the notes already in the IDB
  displayData();
});

// Define the displayData() function
function displayData() {
  // Here we empty the contents of the table body (tbody) element each time the display is updated
  // If you didn't do this, you'd get cart duplicates listed each time a new cart is added
  while (tbody.firstChild) {
    tbody.removeChild(tbody.firstChild);
  }

  // Open our object store and then get a cursor - which iterates through all the
  // different data items in the store
  const objectStore = db.transaction("cart_os").objectStore("cart_os");
  objectStore.openCursor().addEventListener("success", (e) => {
    // Get a reference to the cursor
    const cursor = e.target.result;

    // If there is still another data item to iterate through, keep running this code
    if (cursor) {
      // Create a table body item, h3, and p to put each data item inside when displaying it
      // structure the HTML fragment, and append it inside the tbody

      // table row
      const trow = document.createElement("tr");
      // product column
      const data1 = document.createElement("td");
      // Quantity column
      const data2 = document.createElement("td");
      // size column
      const data3 = document.createElement("td");
      //subtotal column
      const data4 = document.createElement("td");
      // contents of product column
      const imge = document.createElement("img");
      const section = document.createElement("div");
      const nam = document.createElement("h5");
      const pric = document.createElement("h5");
      //   contents of quantity column
      const inputt = document.createElement("input");

      // styling elements
      data1.style.overflow = "hidden";
      data1.style.display = "flex";
      data1.style.justifyContent = "left";
      data1.style.alignItems = "center";
      data1.style.padding = "5px";
      section.style.display = "flex";
      section.style.flexDirection = "column";
      trow.style.backgroundColor = "rgba(0, 0, 0, 0.015)";
      data3.style.fontSize = "11px";
      data4.style.fontSize = "11px";
      data3.style.fontWeight = "bold";
      data4.style.fontWeight = "bold";

      imge.style.width = "90px";
      imge.style.height = "90px";
      imge.style.borderRadius = "7px";
      nam.style.padding = "5px";
      pric.style.padding = "5px";
      pric.style.color = "red";
      inputt.style.width = "40px";
      inputt.setAttribute("type", "number");

      data1.appendChild(imge);
      data1.appendChild(section);
      section.appendChild(nam);
      section.appendChild(pric);
      data2.appendChild(inputt);
      trow.appendChild(data1);
      trow.appendChild(data2);
      trow.appendChild(data3);
      trow.appendChild(data4);
      tbody.appendChild(trow);

      // Put the data from the cursor inside the table body data(td)
      imge.setAttribute("src", cursor.value.image);
      nam.textContent = cursor.value.name;
      pric.textContent = cursor.value.price;
      inputt.value = cursor.value.qty;
      data3.textContent = cursor.value.size;

      // calculating the sub-total by multiplying prize by the inputed quanty
      // slice the price string first to get only the number
      let myPrice = pric.textContent.slice(1);
      let prod = myPrice * inputt.value;
      data4.textContent = "$" + prod;

      // Store the ID of the data item inside an attribute on the trow, so we know
      // which trow (tr) it corresponds to. This will be useful later when we want to delete items
      trow.setAttribute("data-note-id", cursor.value.id);

      // Create a button and place it inside each data1 in the trow
      const deleteBtn = document.createElement("button");
      trow.appendChild(deleteBtn);
      deleteBtn.textContent = "remove";
      deleteBtn.style.fontSize = "8px";
      deleteBtn.style.backgroundColor = "red";
      deleteBtn.style.padding = "5px";
      deleteBtn.style.borderRadius = "5px";
      deleteBtn.style.color = "white";
      deleteBtn.style.fontWeight = "bold";
      deleteBtn.style.marginBottom = "10px";

      // Set an event handler so that when the button is clicked, the deleteItem()
      // function is run
      deleteBtn.addEventListener("click", deleteItem);

      // Iterate to the next item in the cursor
      cursor.continue();
    } else {
      // Again, if list item is empty, display a 'No notes stored' message
      if (!tbody.firstChild) {
        const trow = document.createElement("tr");
        trow.textContent = "No Products added yet.";
        tbody.appendChild(trow);
      }
      // if there are no more cursor items to iterate through, say so
      console.log("Notes all displayed");
    }
  });
}

// Define the deleteItem() function
function deleteItem(e) {
  // retrieve the name of the task we want to delete. We need
  // to convert it to a number before trying to use it with IDB; IDB key
  // values are type-sensitive.
  const noteId = Number(e.target.parentNode.getAttribute("data-note-id"));

  // open a database transaction and delete the task, finding it using the id we retrieved above
  const transaction = db.transaction(["cart_os"], "readwrite");
  const objectStore = transaction.objectStore("cart_os");
  const deleteRequest = objectStore.delete(noteId);

  // report that the data item has been deleted
  transaction.addEventListener("complete", () => {
    // delete the parent of the button
    // which is the list item, so it is no longer displayed
    e.target.parentNode.parentNode.removeChild(e.target.parentNode);
    console.log(`Note ${noteId} deleted.`);

    // Again, if tbody is empty, display a 'No notes stored' message
    if (!tbody.firstChild) {
      const trow = document.createElement("tr");
      trow.textContent = "Cart is empty.";
      tbody.appendChild(trow);
    }
  });
}
