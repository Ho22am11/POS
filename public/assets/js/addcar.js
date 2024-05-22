document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.add-prodect-btn').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            var name = this.getAttribute('data-name');
            var amount = this.getAttribute('data-amount');
            var html = `<tr> <td>${name}</td> <td><input type = "number" name="count" class="form-control" value="1" ></td> <td>${amount}</td> </tr>`;
            document.querySelector('.order_list').insertAdjacentHTML('beforeend', html);
        });
    });
});