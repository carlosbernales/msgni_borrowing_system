function showModal(categoryId) {
    var modalId = '#category_edit_' + categoryId;
    var modalElement = document.querySelector(modalId);
    var bootstrapModal = new bootstrap.Modal(modalElement);
    bootstrapModal.show();
}



function showModal(categoryId) {
    var modalId = '#borrow_edit_' + categoryId;
    var modalElement = document.querySelector(modalId);
    var bootstrapModal = new bootstrap.Modal(modalElement);
    bootstrapModal.show();
}
