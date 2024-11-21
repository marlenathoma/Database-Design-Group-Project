
document.getElementById('reserve-seat').addEventListener('click', function() {

    const selectedSeat = prompt("Enter seat number:");
    if (selectedSeat) {
        fetch('reserveSeat.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ seat_number: selectedSeat })
        })
        .then(response => response.json())
        .then(data => alert(data.message))
        .catch(error => console.error('Error:', error));
    }
});