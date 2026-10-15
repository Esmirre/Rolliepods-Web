-- Run this ONCE, right AFTER importing rolliepods.sql (the original schema stays untouched).
-- It adds what the website needs on top of it, plus a demo admin and sample announcements.
USE rolliepods_db;

-- Announcement cards have an optional image and a color theme.
ALTER TABLE announcements
    ADD COLUMN image VARCHAR(255) NULL AFTER content,
    ADD COLUMN card_color ENUM('orange', 'blue', 'green') NOT NULL DEFAULT 'orange' AFTER image;

-- Demo admin: email admin@rolliepods.com / password admin123 (change it in Admin > Settings).
INSERT INTO users (full_name, email, password_hash, role)
VALUES ('Rollie Admin', 'admin@rolliepods.com', '$2y$12$62oFDuqnnyF7X7D9/vjYwO9CLIaAuCGSEKVsCZanKkBYuCps/Nb6.', 'admin');

INSERT INTO announcements (title, content, author_id, card_color) VALUES
('Quiet hours', 'Shhh... someone''s recharging. Quiet hours are from 10:00 PM to 7:00 AM. Let everyone rest peacefully.', 1, 'orange'),
('Lighten your load', 'Please clean the area after use and keep laundry moving for the next person.', 1, 'blue'),
('Welcome, new tenants', 'Say hi to our newest pod mates. Good spaces, good people.', 1, 'green');
