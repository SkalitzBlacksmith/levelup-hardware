let cart = {};
try {
  const storedCart = JSON.parse(localStorage.getItem("levelup-cart") || "{}");
  if (storedCart && typeof storedCart === "object" && !Array.isArray(storedCart)) {
    for (const id in storedCart) {
      const item = storedCart[id];
      if (item && typeof item.name === "string" && Number.isFinite(item.price) && item.price > 0 && Number.isInteger(item.quantity) && item.quantity > 0 && item.quantity <= 99) cart[id] = item;
    }
  }
} catch (error) { cart = {}; }

const cartItems = document.querySelector(".cart-items");
const cartEmpty = document.querySelector(".cart-empty");
const cartTotal = document.querySelector(".cart-total strong");
const cartCount = document.querySelector(".cart-count");
const euro = new Intl.NumberFormat("nl-NL", { style: "currency", currency: "EUR" });

function saveCart() {
  try { localStorage.setItem("levelup-cart", JSON.stringify(cart)); } catch (error) { /* De winkelwagen werkt ook zonder opslag. */ }
}

function showCart() {
  if (!cartItems) return;
  cartItems.innerHTML = "";
  let total = 0;
  for (const id in cart) {
    const product = cart[id];
    total += product.price * product.quantity;
    const item = document.createElement("li");
    const description = document.createElement("span");
    const controls = document.createElement("div");
    const less = document.createElement("button");
    const more = document.createElement("button");
    const remove = document.createElement("button");
    description.textContent = product.quantity + "× " + product.name + " — " + euro.format(product.price * product.quantity);
    less.textContent = "−";
    more.textContent = "+";
    more.disabled = product.quantity >= 99;
    remove.textContent = "Verwijder";
    less.type = more.type = remove.type = "button";
    less.setAttribute("aria-label", "Eén minder " + product.name);
    more.setAttribute("aria-label", "Eén meer " + product.name);
    less.addEventListener("click", () => {
      product.quantity--;
      if (product.quantity === 0) delete cart[id];
      saveCart(); showCart();
    });
    more.addEventListener("click", () => {
      if (product.quantity < 99) product.quantity++;
      saveCart(); showCart();
    });
    remove.addEventListener("click", () => { delete cart[id]; saveCart(); showCart(); });
    controls.className = "cart-controls";
    controls.append(less, more, remove);
    item.append(description, controls);
    cartItems.append(item);
  }
  cartEmpty.hidden = Object.keys(cart).length > 0;
  cartTotal.textContent = euro.format(total);
  if (cartCount) cartCount.textContent = Object.values(cart).reduce((count, product) => count + product.quantity, 0);
}

document.querySelectorAll(".add-to-cart").forEach((button) => {
  button.addEventListener("click", () => {
    const id = button.dataset.product;
    if (!cart[id]) cart[id] = { name: button.dataset.name, price: Number(button.dataset.price), quantity: 0 };
    if (cart[id].quantity < 99) cart[id].quantity++;
    saveCart(); showCart();
  });
});
showCart();

const orderForm = document.querySelector('#order-form');
if (orderForm) {
  orderForm.addEventListener('submit', (event) => {
    const items = {};
    for (const id in cart) items[id] = cart[id].quantity;
    if (Object.keys(items).length === 0) {
      event.preventDefault();
      cartEmpty.textContent = 'Voeg eerst een product toe aan je winkelwagen.';
      cartEmpty.hidden = false;
      return;
    }
    document.querySelector('#order-products').value = JSON.stringify(items);
  });
}
