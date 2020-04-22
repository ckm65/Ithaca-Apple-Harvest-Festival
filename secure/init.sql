BEGIN TRANSACTION;

CREATE TABLE photo (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	name TEXT NOT NULL UNIQUE,
	count INTEGER NOT NULL DEFAULT 0,
	description TEXT,
	source TEXT
);
 -- Photo data
INSERT INTO photo (id, name, count, description, source) VALUES (1, 'Cider&Apples', 1, 'Cider and Apples are a great representation of the Ithaca Apple Harvest Festival', 'https://www.downtownithaca.com/wp-content/uploads/AppleHarvest_Market.jpg');
INSERT INTO photo (id, name, count, description, source) VALUES (2, 'Donuts', 2, 'Donuts are delicious and a popular food item at the Ithaca Apple Harvest Festival', 'https://www.downtownithaca.com/wp-content/uploads/AH_doughtnuts.jpg');
INSERT INTO photo (id, name, count, description, source) VALUES (3, 'Apples', 3, 'The Ithaca Apple Harvest Festival has a bunch of freshly picked apples avaible for purchase.', 'https://d33wubrfki0l68.cloudfront.net/images/festimgs/fc9297fc2b432afb1276125637553bbe429827b8/img_4454.jpg');
INSERT INTO photo (id, name, count, description, source) VALUES (4, 'Apple Baskets', 4, 'The aesthetics and culture of the Ithaca Apple Harvest Festival makes the event attractive.', 'https://www.eventcrazy.com/event/photos/352755_1_51_091611_115330.jpg');
INSERT INTO photo (id, name, count, description, source) VALUES (5, 'Juggler', 5, 'Entertainment is an attraction to the Festival. Juggling is a famous act that occurs throughout the weekend.', 'https://images.localist.com/photos/554201/original/b50047fbde1c35d0c63cdfde07b1d9fcc654d59e.jpg');
INSERT INTO photo (id, name, count, description, source) VALUES (6, 'Sign', 6, 'Decorations are what makes the Ithaca Apple Harvest Festival inviting for local as well as visiting individuals', 'https://i2.wp.com/cornellsun.com/wp-content/uploads/2019/09/Pg-1-Apple-Fest-by-Boris-Tsang.jpg?fit=1170%2C781');
INSERT INTO photo (id, name, count, description, source) VALUES (7, 'Pie', 7, 'Various types of Pies baked by a variety of vendors are very important to the festival', 'https://i0.wp.com/ithacavoice.com/wp-content/uploads/2016/09/Screen-Shot-2015-10-02-at-2.19.29-PM.png?resize=620%2C420&ssl=1');
INSERT INTO photo (id, name, count, description, source) VALUES (8, 'Corn', 8, 'Corn is a very popular item to eat and buy in the fall weather!', 'https://d33wubrfki0l68.cloudfront.net/images/festimgs/b8e776b7f18e72feecc198ee869c4f2c278d7b4e/img_4461.jpg');
INSERT INTO photo (id, name, count, description, source) VALUES (9, 'Hard Cider', 9, 'The Ithaca Apple Harvest Festival provides many alcoholic ciders and beverages avalible for purchase', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTi9hmRZGRQFMvKeIRdhOE2hqAspl67SK9hvullt9_l99Pk41pYkg');
INSERT INTO photo (id, name, count, description, source) VALUES (10, 'Food&Friends', 10, 'The Ithaca Apple Harvest Festival is a great place to hang out with friends and support the local community.', 'https://www.downtownithaca.com/wp-content/uploads/AppleHarvest-Classic.jpg');
INSERT INTO photo (id, name, count, description, source) VALUES (11, 'Caramel Apples', 11, 'Apples are not only a fruit but can be served as a dessert with delicious toppings!', 'https://s3-media3.fl.yelpcdn.com/bphoto/ox63gqF_ob8V5LSsZ7HjpQ/ls.jpg');
INSERT INTO photo (id, name, count, description, source) VALUES (12, 'Friends', 12, 'Come to the festival with friends to make memories that will last a lifetime', 'https://s3.amazonaws.com/exposure-media/production/photos/dvykxxyvmvl472wy1i2ju4n29czznsxeszdx/original.jpg?fm=pjpg&auto=format&fm=jpg&w=300');







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
