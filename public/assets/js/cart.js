document.addEventListener('DOMContentLoaded', () => {
    renderCart(); // Render ulang keranjang saat halaman dimuat

    // Jika datang dari halaman checkout sukses, hapus cart
    const params = new URLSearchParams(window.location.search);
    if (params.get('checkout') === 'success') {
        localStorage.removeItem('cart');
        renderCart();
    }
});

// Fungsi Menambahkan Produk ke Keranjang
function addToCart(id, nama, harga, gambar) {
    const quantityInput = document.getElementById('quantityInput');
    const jumlah = parseInt(quantityInput ? quantityInput.value : 1) || 1;

    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    const index = cart.findIndex(item => item.id_produk === id);
    if (index !== -1) {
        cart[index].jumlah += jumlah;
    } else {
        cart.push({
            id_produk: id,
            nama_produk: nama,
            harga_satuan: harga,
            jumlah: jumlah,
            gambar: gambar
        });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
}

// Fungsi Menampilkan Isi Keranjang
function renderCart() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartItemsHtml = '';
    let totalHarga = 0;
    let totalItems = 0;

    cart.forEach(item => {
        totalHarga += item.harga_satuan * item.jumlah;
        totalItems += item.jumlah;

        cartItemsHtml += `
            <li>
                <div class="cart-img f-left">
                    <a href="product-details.html">
                        <img src="${item.gambar}" alt="${item.nama_produk}" />
                    </a>
                </div>
                <div class="cart-content f-left text-left">
                    <h5>
                        <a href="product-details.html">${item.nama_produk}</a>
                    </h5>
                    <div class="cart-price">
                        <span class="ammount">${item.jumlah} <i class="fal fa-times"></i></span>
                        <span class="price">Rp ${(item.harga_satuan * item.jumlah).toLocaleString()}</span>
                    </div>
                </div>
                <div class="del-icon f-right mt-30">
                    <a href="#" onclick="removeFromCart(${item.id_produk})">
                        <i class="fal fa-times"></i>
                    </a>
                </div>
            </li>
        `;
    });

    const cartList = document.querySelector('.cart-list');
    const totalHargaEl = document.getElementById('total-harga');
    const totalItemsEl = document.getElementById('total-items');

    if (cartList) cartList.innerHTML = cartItemsHtml;
    if (totalHargaEl) totalHargaEl.textContent = 'Rp ' + totalHarga.toLocaleString();
    if (totalItemsEl) totalItemsEl.textContent = totalItems;
}

// Fungsi Menghapus Produk dari Keranjang
function removeFromCart(id) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(item => item.id_produk !== id);
    localStorage.setItem('cart', JSON.stringify(cart));
    renderCart();
}

// Fungsi Checkout
function checkout() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    if (cart.length === 0) {
        alert('Keranjang kosong! Tambahkan produk ke keranjang terlebih dahulu.');
        return;
    }

    // Encode cart sebelum hapus
    const cartData = encodeURIComponent(JSON.stringify(cart));

    // Bersihkan cart langsung setelah klik checkout
    localStorage.removeItem('cart');
    renderCart();

    // Redirect ke halaman checkout
    const checkoutUrl = `/checkout/view?cart=${cartData}`;
    window.location.href = checkoutUrl;
}

// Event listener untuk tombol checkout
document.getElementById('checkoutBtn').addEventListener('click', checkout);
