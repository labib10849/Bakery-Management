
window.onload = function() {
    var currentDate = new Date();
    var maxDate = new Date();
    maxDate.setMonth(maxDate.getMonth() - 3); // Allow dates up to 3 months ago
    var dateInput = document.getElementById('productDate');
    dateInput.max = currentDate.toISOString().split('T')[0]; // Set max date to today
    dateInput.min = maxDate.toISOString().split('T')[0]; // Set min date to 3 months ago

    dateInput.addEventListener('input', function() {
        var selectedDate = new Date(this.value);
        if (selectedDate > currentDate || selectedDate < maxDate) {
            alert("Please select a date within the allowed range.");
            this.value = ''; // Clear the input field if date is not within the allowed range
        }
    });
}
