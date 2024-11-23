Create database events;
use events;
Create table users (
    user_id int auto_increment primary key,
    name varchar(100),
    email_address varchar(100) unique,
    password varchar(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
create table events_list (
    event_id int auto_increment primary key,
    name varchar(255),
    description text,
    event_date datetime,
    venue varchar(100),
    total_seats int
);
CREATE TABLE seats (
    seat_id int auto_increment primary key,
    event_id int,
    seat_number varchar(10),
    status ENUM('available', 'reserved') DEFAULT 'available',
    foreign key (event_id) references events_list(event_id)
);
CREATE TABLE bookings (
    booking_id int auto_increment primary key,
    user_id int,
    event_id int,
    seat_id int,
    payment_status ENUM('pending', 'paid') DEFAULT 'pending',
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    foreign key (user_id) references users(user_id),
    foreign key (event_id) references events_list(event_id),
    foreign key (seat_id) references seats(seat_id)
);
INSERT INTO event_list (events_id,name,description,venue,total_seats) VALUES
(1, 'Jazz Night', 'An evening of smooth jazz music featuring local bands. ', 'Downtown Concert Hall', 200),
(2, 'Tech Conference 2024', 'A gathering of tech enthusiasts and industry leaders discussing innovations. ', 'City Expo Center', 500),
(3, 'Charity Run 5k', 'Annual 5k run to raise funds for local charities. ', 'Riverside Park', 300);

