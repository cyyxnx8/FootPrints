// Retrieve the user details from localStorage
const userName = localStorage.getItem('userName');
const userEmail = localStorage.getItem('userEmail');
const userPhone = localStorage.getItem('userPhone') || "Not provided";  // Default if no phone number is stored
const userAddress = localStorage.getItem('userAddress') || "Not provided";  // Default if no address is stored

// Display the user's name and details on the page
document.getElementById('userName').textContent = userName;
document.getElementById('userEmail').textContent = userEmail;
document.getElementById('userPhone').textContent = userPhone;
document.getElementById('userAddress').textContent = userAddress;

// Update details form submission
document.getElementById('updateDetailsForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Get the updated details
    const updatedPhone = document.getElementById('phone').value;
    const updatedAddress = document.getElementById('address').value;

    // Save the updated details to localStorage
    localStorage.setItem('userPhone', updatedPhone);
    localStorage.setItem('userAddress', updatedAddress);

    // Update the display with the new details
    document.getElementById('userPhone').textContent = updatedPhone;
    document.getElementById('userAddress').textContent = updatedAddress;

    alert("Your details have been updated!");
});

// Display the user's orders (mock orders for this example)
const orders = JSON.parse(localStorage.getItem('userOrders')) || [];
const ordersList = document.getElementById('ordersList');

if (orders.length === 0) {
    ordersList.innerHTML = '<p>No orders yet.</p>';
} else {
    ordersList.innerHTML = '';  // Clear existing content
    orders.forEach(order => {
        const orderElement = document.createElement('p');
        orderElement.textContent = `Order ID: ${order.id} - Status: ${order.status}`;
        ordersList.appendChild(orderElement);
    });
}

// Example of how you might add orders (this would be triggered by actual purchases)
function addOrder(orderId, status) {
    const order = { id: orderId, status: status };
    orders.push(order);
    localStorage.setItem('userOrders', JSON.stringify(orders));
}
