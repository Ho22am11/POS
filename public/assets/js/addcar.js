document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.add-prodect-btn').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            var id = this.getAttribute('data-id');
            var name = this.getAttribute('data-name');
            var amount = this.getAttribute('data-amount');
            var html = `<tr> <td>${name}</td>
            <td><input type = "number" name="count" class="form-control" value="1" ></td>
            <td>${amount}</td>
            <td><button class="btn btn-danger btn-sm remove-product-btn"   data-id="${id}">
               <span class="fa fa-trash"></span>
               </button>
            </td> </tr>`;
            document.querySelector('.order_list').insertAdjacentHTML('beforeend', html);
        });
    });

    document.querySelector('.order_list').addEventListener('click', function(event) {
        if (event.target.closest('.remove-product-btn')) {
            event.target.closest('tr').remove();
        }
    });
});