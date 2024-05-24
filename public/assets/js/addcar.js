document.addEventListener('DOMContentLoaded', function() {
    // Function to update total amount
    function updateTotalAmount() {
        let total = 0;
        document.querySelectorAll('.order_list tr').forEach(function(row) {
            let count = parseFloat(row.querySelector('input[name="count"]').value);
            let amount = parseFloat(row.querySelector('td:nth-child(3)').getAttribute('data-amount'));
            total += count * amount;
        });
        document.getElementById('total-amount').textContent = total.toFixed(2);

        var inputtotal = `<input type="hidden" name="total" value="${total}" >`
        document.querySelector('.orde').insertAdjacentHTML('beforeend', inputtotal);
        
    }

    // Add product button event listener
    document.querySelectorAll('.add-prodect-btn').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            var id = this.getAttribute('data-id');
            var name = this.getAttribute('data-name');
            var amount = parseFloat(this.getAttribute('data-amount'));
            var html = `<tr> 
                            <td>${name}</td>
                            <td><input type="number" name="count" class="form-control" value="1" min="1" data-id="${id}" ></td>
                            <td name="amount" data-amount="${amount}">${amount}</td>
                            <td>
                                <button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}">
                                    <span class="fa fa-trash"></span>
                                </button>
                            </td>
                        </tr>`;
            document.querySelector('.order_list').insertAdjacentHTML('beforeend', html);
            var input = `<input type="hidden" name="products[${id}][id]" value="${id}">
            <input type="hidden" name="products[${id}][count]" value="1" class="hidden-count-${id}">

            `

            document.querySelector('.orde').insertAdjacentHTML('beforeend', input);
            updateTotalAmount();
        });
    });



    // Event delegation for remove buttons and count inputs
    document.querySelector('.order_list').addEventListener('click', function(event) {
        if (event.target.closest('.remove-product-btn')) {
            event.preventDefault(); // Prevent the default button behavior
            event.target.closest('tr').remove();
            updateTotalAmount();
        }
    });

    document.querySelector('.order_list').addEventListener('input', function(event) {
        if (event.target.name === 'count') {
            let id = event.target.getAttribute('data-id');
            document.querySelector(`.hidden-count-${id}`).value = event.target.value;
            updateTotalAmount();

        }
    });
});