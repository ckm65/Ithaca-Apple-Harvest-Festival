BEGIN TRANSACTION;


-- Gallery Table
CREATE TABLE gallery (
    gallery_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    file_name TEXT,
    file_ext TEXT,
    description TEXT,
    source TEXT
);

-- Reviews table seed data
INSERT INTO gallery (gallery_id, file_name, file_ext, description, source) VALUES (1, 'apple_cider.jpg', 'jpg', 'Apples & Cider','https://www.downtownithaca.com/wp-content/uploads/AppleHarvest_Market.jpg');
INSERT INTO gallery (gallery_id, file_name, file_ext, description, source) VALUES (2, 'donuts.jpg', 'jpg', 'Donuts','https://www.downtownithaca.com/wp-content/uploads/AH_doughtnuts.jpg');
INSERT INTO gallery (gallery_id, file_name, file_ext, description, source) VALUES (3, 'apples.jpg', 'jpg', 'Apples','https://d33wubrfki0l68.cloudfront.net/images/festimgs/fc9297fc2b432afb1276125637553bbe429827b8/img_4454.jpg');
INSERT INTO gallery (gallery_id, file_name, file_ext, description, source) VALUES (4, 'apple_basket.jpg', 'jpg', 'Apple Basket','https://www.eventcrazy.com/event/photos/352755_1_51_091611_115330.jpg');
INSERT INTO gallery (gallery_id, file_name, file_ext, description, source) VALUES (5, 'juggle.jpg', 'jpg', 'Juggler','https://images.localist.com/photos/554201/original/b50047fbde1c35d0c63cdfde07b1d9fcc654d59e.jpg');
INSERT INTO gallery (gallery_id, file_name, file_ext, description, source) VALUES (6, 'sign.jpg', 'jpg', 'Cider Donut Sign','https://i2.wp.com/cornellsun.com/wp-content/uploads/2019/09/Pg-1-Apple-Fest-by-Boris-Tsang.jpg?fit=1170%2C781');
INSERT INTO gallery (gallery_id, file_name, file_ext, description, source) VALUES (7, 'pie.jpg', 'jpg', 'Pie','https://i0.wp.com/ithacavoice.com/wp-content/uploads/2016/09/Screen-Shot-2015-10-02-at-2.19.29-PM.png?resize=620%2C420&ssl=1');
INSERT INTO gallery (gallery_id, file_name, file_ext, description, source) VALUES (8, 'corn.jpg', 'jpg', 'Corn','https://d33wubrfki0l68.cloudfront.net/images/festimgs/b8e776b7f18e72feecc198ee869c4f2c278d7b4e/img_4461.jpg');
INSERT INTO gallery (gallery_id, file_name, file_ext, description, source) VALUES (9, 'hard_cider.jpg', 'jpg', 'Hard Cider Stand','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTi9hmRZGRQFMvKeIRdhOE2hqAspl67SK9hvullt9_l99Pk41pYkg');
INSERT INTO gallery (gallery_id, file_name, file_ext, description, source) VALUES (10, 'friends.jpg', 'jpg', 'Friends','https://www.downtownithaca.com/wp-content/uploads/AppleHarvest-Classic.jpg');
INSERT INTO gallery (gallery_id, file_name, file_ext, description, source) VALUES (11, 'caramel_apples.jpg', 'jpg', 'Caramel Apples','https://s3-media3.fl.yelpcdn.com/bphoto/ox63gqF_ob8V5LSsZ7HjpQ/ls.jpg');
INSERT INTO gallery (gallery_id, file_name, file_ext, description, source) VALUES (12, 'apple_picking.jpg', 'jpg', 'Apple Picking','https://s3.amazonaws.com/exposure-media/production/photos/dvykxxyvmvl472wy1i2ju4n29czznsxeszdx/original.jpg?fm=pjpg&auto=format&fm=jpg&w=300');

CREATE TABLE tags (
    tag_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
    tag_name TEXT

);
INSERT INTO tags (tag_id, tag_name) VALUES (1, '#food');
INSERT INTO tags (tag_id, tag_name) VALUES (2, '#dessert');
INSERT INTO tags (tag_id, tag_name) VALUES (3, '#funk');
INSERT INTO tags (tag_id, tag_name) VALUES (4, '#cider');
INSERT INTO tags (tag_id, tag_name) VALUES (5, '#apples');
INSERT INTO tags (tag_id, tag_name) VALUES (6, '#friends');

CREATE TABLE image_tags (
    gallery_id INTEGER NOT NULL,
    tag_id INTEGER NOT NULL


);

INSERT INTO image_tags (tag_id, gallery_id) VALUES (1, 2);
INSERT INTO image_tags (tag_id, gallery_id) VALUES (1, 4);
INSERT INTO image_tags (tag_id, gallery_id) VALUES (1, 5);
COMMIT;
