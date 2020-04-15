BEGIN TRANSACTION;

-- Reviews Table
CREATE TABLE gallery (
    gallery_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    file_name TEXT,
    file_ext TEXT,
    description TEXT
);

-- Reviews table seed data
INSERT INTO gallery (gallery_id, file_name, file_ext, description) VALUES (1, 'apple_cider.jpg', 'jpg', 'Apples & Cider');
INSERT INTO gallery (gallery_id, file_name, file_ext, description) VALUES (2, 'donuts.jpg', 'jpg', 'Donuts');
INSERT INTO gallery (gallery_id, file_name, file_ext, description) VALUES (3, 'apples.jpg', 'jpg', 'Apples');
INSERT INTO gallery (gallery_id, file_name, file_ext, description) VALUES (4, 'apple_basket.jpg', 'jpg', 'Apple Basket');
INSERT INTO gallery (gallery_id, file_name, file_ext, description) VALUES (5, 'juggle.jpg', 'jpg', 'Juggler');
INSERT INTO gallery (gallery_id, file_name, file_ext, description) VALUES (6, 'sign.jpg', 'jpg', 'Cider Donut Sign');
INSERT INTO gallery (gallery_id, file_name, file_ext, description) VALUES (7, 'pie.jpg', 'jpg', 'Pie');
INSERT INTO gallery (gallery_id, file_name, file_ext, description) VALUES (8, 'corn.jpg', 'jpg', 'Corn');
INSERT INTO gallery (gallery_id, file_name, file_ext, description) VALUES (9, 'hard_cider.jpg', 'jpeg', 'Hard Cider Stand');
INSERT INTO gallery (gallery_id, file_name, file_ext, description) VALUES (10, 'friends.jpg', 'jpg', 'Friends');
INSERT INTO gallery (gallery_id, file_name, file_ext, description) VALUES (11, 'caramel_apples.jpg', 'jpg', 'Caramel Apples');
INSERT INTO gallery (gallery_id, file_name, file_ext, description) VALUES (12, 'apple_picking.jpg', 'jpg', 'Apple Picking');

COMMIT;
