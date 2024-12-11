// Fungsi untuk menyimpan produk ke keranjang
function addToCart(productName, productPrice) {
    // Ambil keranjang yang sudah ada, atau buat array baru jika belum ada
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Tambahkan produk ke keranjang
    cart.push({ name: productName, price: productPrice });

    // Simpan kembali ke localStorage
    localStorage.setItem("cart", JSON.stringify(cart));

    // Tampilkan produk yang baru saja ditambahkan ke keranjang
    renderCart();
}

// Fungsi untuk menampilkan produk di halaman keranjang
function renderCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let cartItemsContainer = document.getElementById("cart-items");
    let totalPrice = 0;

    // Kosongkan keranjang sebelum render ulang
    cartItemsContainer.innerHTML = "";

    // Render setiap produk di keranjang
    cart.forEach((item, index) => {
        let itemElement = document.createElement("div");
        itemElement.classList.add("cart-item");

        itemElement.innerHTML = `
            <p><strong>${item.name}</strong></p>
            <p>Harga: Rp${item.price}</p>
            <button onclick="removeFromCart(${index})">Hapus</button>
        `;

        cartItemsContainer.appendChild(itemElement);

        // Hitung total harga
        totalPrice += item.price;
    });

    // Tampilkan total harga
    document.getElementById("total-price").textContent = `Total: Rp${totalPrice}`;
}

// Fungsi untuk menghapus produk dari keranjang
function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Hapus item dari keranjang berdasarkan index
    cart.splice(index, 1);

    // Simpan kembali ke localStorage
    localStorage.setItem("cart", JSON.stringify(cart));

    // Render ulang keranjang
    renderCart();
}

// Fungsi untuk mengosongkan seluruh keranjang
function clearCart() {
    localStorage.removeItem("cart");
    renderCart();
}

// Render keranjang ketika halaman dimuat
document.addEventListener("DOMContentLoaded", function() {
    renderCart();
});

