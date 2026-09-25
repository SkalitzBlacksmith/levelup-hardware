const products = {
  laptop: { name: "Gaming Laptop X1", price: 1499 },
  pc: { name: "Custom Gaming PC", price: 1999 },
  headset: { name: "Pro Gaming Headset", price: 199 }
};

const cart = {};
const cartItems = document.querySelector(".cart-items");
const cartEmpty = document.querySelector(".cart-empty");
const cartTotal = document.querySelector(".cart-total strong");
const euro = new Intl.NumberFormat("nl-NL", {
  style: "currency",
  currency: "EUR"
});

function showCart() {
  cartItems.innerHTML = "";
  let total = 0;

  for (const [id, quantity] of Object.entries(cart)) {
    const product = products[id];
    const itemTotal = product.price * quantity;
    total += itemTotal;

    const item = document.createElement("li");
    const description = document.createElement("span");
    const removeButton = document.createElement("button");

    description.textContent = `${quantity}× ${product.name} — ${euro.format(itemTotal)}`;
    removeButton.type = "button";
    removeButton.textContent = "Verwijder";

    removeButton.addEventListener("click", () => {
      delete cart[id];
      showCart();
    });

    item.append(description, removeButton);
    cartItems.append(item);
  }

  cartEmpty.hidden = Object.keys(cart).length > 0;
  cartTotal.textContent = euro.format(total);
}

document.querySelectorAll(".add-to-cart").forEach((button) => {
  button.addEventListener("click", () => {
    const id = button.dataset.product;
    cart[id] = (cart[id] || 0) + 1;
    showCart();
  });
});

showCart();