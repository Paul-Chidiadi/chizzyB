const img = document.querySelector("#img");
const namie = document.querySelector("#name");
const price = document.querySelector("#price");
const qty = document.querySelector(".qty");
const size = document.querySelector("#size");
const product_id = document.querySelector("#ided");
const addBtn = document.querySelector(".btn");

// Storing products added to cart on the user's device local storage USING INDEXEDDB

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
});

// Set up the database tables if this has not already been done
openRequest.addEventListener("upgradeneeded", (e) => {
  // Grab a reference to the opened database
  db = e.target.result;

  // Create an objectStore to store our notes in (basically like a single table)
  // including a auto-incrementing key
  const objectStore = db.createObjectStore("cart_os", {
    keyPath: "id",
    autoIncrement: true,
  });

  // Define what data items the objectStore will contain
  objectStore.createIndex("image", "image", { unique: false });
  objectStore.createIndex("name", "name", { unique: false });
  objectStore.createIndex("price", "price", { unique: false });
  objectStore.createIndex("qty", "qty", { unique: false });
  objectStore.createIndex("size", "size", { unique: false });
  objectStore.createIndex("sub", "sub", { unique: false });
  objectStore.createIndex("product_id", "product_id", { unique: false });

  console.log("Database setup complete");
});

// Create a cick event handler so that when addbtn is clicked the addData() function is run
addBtn.addEventListener("click", addData);

// Define the addData() function
function addData(e) {
  // prevent default - we don't want the anchor tag to click in the conventional way
  e.preventDefault();

  // calculating the sub-total by multiplying prize by the inputed quanty
  // slice the price string first to get only the number
  let myPrice = price.textContent.slice(1);
  let prod = myPrice * qty.value;

  // grab the values from the fields and store them in an object ready for being inserted into the DB
  const newItem = {
    image: img.getAttribute("src"),
    name: namie.textContent,
    price: price.textContent,
    size: size.value,
    qty: qty.value,
    sub: "$" + prod,
    product_id: product_id.value,
  };

  // open a read/write db transaction, ready for adding the data
  const transaction = db.transaction(["cart_os"], "readwrite");

  // call an object store that's already been added to the database
  const objectStore = transaction.objectStore("cart_os");

  // Make a request to add our newItem object to the object store
  const addRequest = objectStore.add(newItem);

  addRequest.addEventListener("success", () => {
    console.log("newItems added.");
  });

  // Report on the success of the transaction completing, when everything is done
  transaction.addEventListener("complete", () => {
    console.log("Transaction completed: database modification finished.");

    //redirect cart.php page
    window.location.assign("cart.php");
  });

  transaction.addEventListener("error", () =>
    console.log("Transaction not opened due to error")
  );
}
