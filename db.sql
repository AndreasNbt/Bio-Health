CREATE DATABASE BioHealth DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE BioHealth;

CREATE TABLE users(
  user_id INT AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(20) NOT NULL,
  role enum('Administrator', 'Customer') NOT NULL,
  PRIMARY KEY(user_id)
);

CREATE TABLE userinfo (
  User_ID INT,
  Full_Name VARCHAR(30),
  City VARCHAR(30),
  Address VARCHAR(30),
  State VARCHAR(30),
  Zip_Code VARCHAR(10),
  Phone_Number VARCHAR(15),
  FOREIGN KEY (User_ID) REFERENCES users(user_id)
);

CREATE TABLE creditcard (
  id INT AUTO_INCREMENT,
  user_id INT NOT NULL,
  name VARCHAR(100) NOT NULL,
  number VARCHAR(15) NOT NULL,
  exp_month INT NOT NULL,
  exp_year INT NOT NULL,
  cvv INT NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);


CREATE TABLE category (
  id INT AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  PRIMARY KEY(id)
);


CREATE TABLE product (
  id INT AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  price FLOAT NOT NULL,
  stock INT NOT NULL,
  description VARCHAR(250) NOT NULL,
  image VARCHAR(40) NOT NULL,
  category_id INT,
  PRIMARY KEY(id),
  FOREIGN KEY (category_id) REFERENCES category(id)
);

CREATE TABLE cart (
  id INT AUTO_INCREMENT,
  user_id INT NOT NULL,
  creation_date DATE,
  PRIMARY KEY(id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);


CREATE TABLE cartitem (
  id INT AUTO_INCREMENT,
  cart_id INT NOT NULL,
  product_id INT NOT NULL,
  amount INT NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (cart_id) REFERENCES cart(id),
  FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE orders (
  id INT AUTO_INCREMENT,
  customer_id INT NOT NULL,
  order_date DATE,
  completed BOOLEAN NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (customer_id) REFERENCES users(user_id)
);

CREATE TABLE orderitem (
  id INT AUTO_INCREMENT,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  amount INT NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (order_id) REFERENCES orders(id),
  FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE shippingaddress (
  id INT AUTO_INCREMENT,
  order_id INT NOT NULL,
  address VARCHAR(50),
  city VARCHAR(30),
  state VARCHAR(30),
  zip VARCHAR(10),
  PRIMARY KEY(id),
  FOREIGN KEY (order_id) REFERENCES orders(id)
);

INSERT INTO users(username, password, email, role)
VALUES ('admin', 'admin', '', 1);

INSERT INTO category(name)
VALUES 
  ('Vegan'),
  ('Gluten Free'),
  ('Snacks'),
  ('Personal Care'),
  ('Pastries & Confectionery'),
  ('Spreads');


INSERT INTO product (name, price, stock, description, image, category_id)
VALUES 
('Prune puree', 2.5, 100, 'Keep in a cool and dry place. After opening consume at once.', 'sources/images/Prune_puree.png' , 1),
('Rice flour burgers', 3.75, 50, 'Keep in a cool and dry place. Pour the mixture in a bowl and add 300g water and 3 tablespoons of oil. Mix the ingredients and make your burgers. Bake in the oven at 170C for 10-15 minutes.', 'sources/images/Rice_flour_burger.png' , 1 ),
('Rice hazelnut drink', 3.20, 100, 'The rice hazelnut drink have mixed sublimely light rice with intense hazelnuts for a delightful taste experience that you’ll wish you could enjoy by bites rather than sips!' , 'sources/images/Rice_hazelnut.png', 1),
('Peanut butter', 3.45, 100, 'Keep in a cool and dry place.', 'sources/images/Peanut_butter.png', 1),
('Turmeric powder', 1.36, 150, 'Keep in a cool and dark place.', 'sources/images/Turmeric_powder.png', 1),
('Almond oil', 7.8, 100, 'The edible organic almond oil of 7elements, is a 100% pure oil produced by the method of cold pressing. It is rich in vitamins E, K, oleic, linoleic acid and is filtered naturally, preserving all its nutrients.', 'sources/images/Almond_oil.png', 1),
('Soya chunks', 4.6, 100, 'Add soya chunks in boiling water or stock and soak for 10 minutes. Drain well and squeeze out excessive water.', 'sources/images/Soya_chunks.png', 1),
('Minced soya', 5.25, 100, 'Add minced soya in boiling water or stock and soak for 10 minutes. Drain and squeeze the excessive water.', 'sources/images/Minced_soya.png', 1),
('Coconut Sugar', 2.06, 100, 'Coconut sugar is a natural, unprocessed sweetener derived from the flowers of the coconut tree. Cocos nucifera, where coconut comes from, is one of the most productive and widespread plants in the world.', 'sources/images/Coconut_sugar.png', 2),
('Konjac Rice', 2.36, 100, "Crazy about rice? We've got the perfect product for you! Made from all-natural organic gluten-free Konjac flour and organic oat fibre, Slim Rice is a low-calorie alternative that helps you lose weight without compromising on taste.", 'sources/images/Coconut_sugar.png', 2),
('Konjac Spaghetti', 2.40, 100, "The Konjac spaghetti is made from all-natural organic konjac flour and gluten-free organic oat fibre. Slim Pasta Spaghetti is a low-calorie alternative that helps you lose weight without compromising on taste.", 'sources/images/Konjac_spaghetti.png', 2),
('Gluten free oat flakes', 3.43, 100, 'Keep in a cool and dry place.', 'sources/images/Gf_oat_flakes.png', 2),
('Nutritional yeast flakes', 6.39, 100, 'Keep in a cool and dry place. Dissolve it in water, milk, fruits, juices, vegetables, for sprinkling in sοups, boiled, cook, salads and cereals.', 'sources/images/Nutr_yeast_flakes.png', 2),
('Oat drink', 3.01, 100, 'Gluten free oat drink, a source of fibre, without added sugars and appreciated by vegetarians and vegans for its nutritional qualities and taste. ', 'sources/images/Gf_oat_drink.png', 2),
('Yeast powder', 0.93, 100, 'Biovegan yeast powder is organic, gluten free, lactose free and GMO free.', 'sources/images/Yeast_powder.png', 2),
('Konjac noodles', 2.26, 100, 'Made from all-natural organic Konjac flour and gluten-free organic oat, Slim Noodles is a low-calorie alternative that helps you lose weight without compromising on taste. Its unique blend keeps you satiated for an extended period of time.', 'sources/images/Konjac_noodles.png', 2),
('Dino Chips', 1.65, 100, 'Give your children a unique dinosaur-shaped chips snack and cheese flavor. Made with lentils and corn, gluten free and high in fiber.', 'sources/images/Dino_chips.png', 3),
('Carrot Stix', 1.25, 100, 'Organic corn snack with carrot and herbs. It has a unique taste while being prepared from 100% organic ingredients. Suitable for children over 10 months.', 'sources/images/Carrot_stix.png', 3),
('Fruit Bar', 1.45, 100, 'Organic fruit bar with pear and apple. Keep in a cool and dry place.', 'sources/images/Fruit_bar.png', 3),
('Red Velvet Biscuit', 1.25, 100, "Raw biscuit with cocoa and almonds from Leya's Cookies. The raw cocoa biscuit with soft creamy cream is delicious and satisfies the desire for something sweet on a busy day. ", 'sources/images/Velvet_biscuit.png', 3),
('Corn Cakes', 1.10, 100, 'Keep in a cool and dry place.', 'sources/images/Velvet_biscuit.png', 3),
('Dried Blueberry', 4.69, 100, 'Keep in a cool and dark place. After opening keep refrigerated.', 'sources/images/Dried_blueberry.png', 3),
('Dried Mulberries', 2.54, 100, 'Keep in a cool and dry place.', 'sources/images/Dried_mulburries.png', 3),
('Black Raisin', 1.99, 100, 'Keep in a cool and dry place.', 'sources/images/Dried_mulburries.png', 3),
('Olive soap', 1.58, 100, 'Pure, natural soap from olive oil, with salt and natural aroma.', 'sources/images/Olive_soap.png', 4),
('Lice shampoo', 13.70, 100, 'This shampoo contains neem oil, which soothes itching and sweet almond oil, which smoothes and gives a light shine to your hair.', 'sources/images/Olive_soap.png', 4),
('Natural beeswax', 5.38, 50, '100% natural beeswax for cosmetic use. It is an amazing natural substance that can be used in many ways.', 'sources/images/Beeswax.png', 4),
('Eucalyptus essential oil', 5.45, 50, 'Eucalyptus essential oil makes it easier to breathe consciously during the cold season. Offers relief and provides nourishment for dry skin.', 'sources/images/Eucalyptus_oil.png', 4), 
('Jojoba oil', 8.85, 100, '7elements organic jojoba oil is produced by the method of cold pressing. Its high content of fat and vitamin E by-products offers protection and softness. It has moisturizing properties and is absorbed very quickly by the skin. In addition, jojoba oil increases the shelf life of blends.', 'sources/images/Jojoba_oil.png', 4),
('Rose olive soap', 1.58, 100, 'Pure, natural soap from olive oil, with salt and natural aroma.', 'sources/images/Rose_soap.png', 4),
('Carrot oil', 6.03, 100, 'Essential carrot oil, ideal for tanning and moisturizing. With a high content of vitamins B, C, D, E, and especially antioxidant beta-carotene. Suitable for use against premature aging, itching, burns, dryness, psoriasis and eczema. Protects skin affected by vitiligo when exposed to sunlight.', 'sources/images/Carrot_oil.png', 4),
('Rose water', 6.21, 100, 'Organic rose water suitable for culinary & cosmetic use. Moisturizes, rejuvenates, cleanses and tightens the skin.', 'sources/images/Rose_water.png', 4),
('Maple Syrup', 6.55, 100, 'Maple syrup, a real Institute in Canada (widely used as an accompaniment to pancakes and crepes, while the leaf of the tree adorns the flag of the country) and has healing properties similar to those of bilberry, green tea and other "superfoods".', 'sources/images/Maple_syrup.png', 5),
('Dry yeast', 0.99, 100, 'Keep in a cool and dry place. Each sachet corresponds to 25g of fresh yeast for 500g of flour.', 'sources/images/Dry_yeast.png', 5),
('Chocolate croissant', 1.18, 100, '', 'sources/images/Croissant.png', 5),
('Cocoa powder', 2.36, 100, 'This organic cocoa powder will offer you wonderful drinks and sweets. Cocoa is good for your health and is considered a superfood, as it is a natural source of magnesium and rich in vitamins, salts, phosphorus, iron & minerals.', 'sources/images/Cocoa_powder.png', 5),
('Baking powder', 1.05, 100, 'Keep in a cool and dry place.', 'sources/images/Baking_powder.png', 5),
('Wheat bread in slices', 3.36, 100, 'Keep in a cool and dry place. After opening consume within few days.', 'sources/images/Wheat_bread.png', 5),
('Corn pizza base', 2.23, 100, 'Keep in cool and dry place. Once opened keep it in the refrigerator and consume within 2 days. Put your favourite topping in the top of the unwrapped pizza base and bake it in an preheated oven at 190 ºC for about 10-12 mins.', 'sources/images/Pizza_base.png', 5),
('Oat crackers', 1.62, 100, 'Keep in a cool and dry place.', 'sources/images/Oat_crackers.png', 5),
('Almond butter', 7.62, 100, 'Keep in a cool and dark place.', 'sources/images/Almond_butter.png', 6),
('Unhulled tahini', 8.16, 100, 'Keep in a cool and shady place. ', 'sources/images/Unhulled_tahini.png', 6),
('Wholegrain tahini', 8.18, 100, 'Keep in a cool and dry place.', 'sources/images/Wholegrain_tahini.png', 6),
('Strawberry jam', 4.97, 100, '', 'sources/images/Strawberry_tahini.png', 6),
('Apricot spread', 4.19, 100, 'Keep in a cool and dry place. After opening keep refrigerated and consume within 20 days.', 'sources/images/Apricot_spread.png', 6),
('Ghee butter', 10.97, 100, 'Keep in a cool and dry place. Ideal for cooking', 'sources/images/Ghee_butter.png', 6),
('Vegalina hazelnut praline', 7.16, 100, 'Keep in a cool and dry place.', 'sources/images/Vegalina_praline.png', 6),
('Tahini with honey', 4.41, 100, 'Keep in a cool and dry place.', 'sources/images/Tahini_honey.png', 6);
