//& ************************************************* || Code for Remove Product Button || ********************************************** //

const removeButtons = document.querySelectorAll('.remove_product');

removeButtons.forEach(removeButton => {
    removeButton.addEventListener('click', (e) => {
        const button = e.target;
        let checkbox = button.previousElementSibling;
        checkbox.checked = true;
    });
})

//& ************************************************* || Code for Remove Product Button || ********************************************** //