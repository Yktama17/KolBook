document.addEventListener('DOMContentLoaded', function() {
    const addFilterButton = document.getElementById('add-filter');
    const filterContainer = document.getElementById('filter-container');

    if (addFilterButton && filterContainer) {
        addFilterButton.addEventListener('click', function() {
            const filterGroup = document.createElement('div');
            filterGroup.classList.add('form-group', 'filter-group');
            filterGroup.innerHTML = `
                <select name="filter[]" class="form-control mr-sm-2">
                    <option value="author">Author</option>
                    <option value="title">Title</option>
                </select>
                <input type="text" name="filterValue[]" class="form-control mr-sm-2" placeholder="Enter value">
                <button type="button" class="btn btn-danger btn-sm remove-filter">Remove</button>
            `;
            filterContainer.appendChild(filterGroup);

            // Add event listener to the newly added remove button
            const removeButton = filterGroup.querySelector('.remove-filter');
            removeButton.addEventListener('click', function() {
                filterGroup.remove();
            });
        });

        // Delegate the event listener for remove buttons
        filterContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-filter')) {
                event.target.closest('.filter-group').remove();
            }
        });
    }
});
