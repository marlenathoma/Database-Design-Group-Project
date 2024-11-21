use events;
SELECT seat_id, seat_number 
FROM seats 
WHERE event_id = event_id AND status = 'available';


SELECT users.name, events_list.name AS event_name, seats.seat_number, bookings.payment_status
FROM bookings
JOIN users ON bookings.user_id = users.user_id
JOIN events_list ON bookings.event_id = events_list.event_id
JOIN seats ON bookings.seat_id = seats.seat_id
WHERE bookings.user_id = users.user_id;