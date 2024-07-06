function deleteProduct(id) {
    if (confirm("Are you sure you want to delete this product?")) {
        window.location.href = "view_products.php?delete_id=" + id;
    }
}
