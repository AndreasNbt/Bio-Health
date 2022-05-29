CREATE DATABASE BioHealth DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE BioHealth;

CREATE TABLE user (
    user_id INT AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(20) NOT NULL,
    role enum('Administrator', 'Customer') NOT NULL,
    PRIMARY KEY(user_id)
);

CREATE TABLE user_info (
    User_ID INT,
    Full_Name VARCHAR(30),
    City VARCHAR(30),
    Address VARCHAR(30),
    State VARCHAR(30),
    Zip_Code VARCHAR(10),
    Phone_Number VARCHAR(15),
    FOREIGN KEY (User_ID) REFERENCES user(user_id)
);

CREATE TABLE category (
    id INT AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    icon VARCHAR(75) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE product (
    id INT AUTO_INCREMENT,
    name VARCHAR(75) NOT NULL,
    price FLOAT NOT NULL,
    stock INT NOT NULL,
    description VARCHAR(750) NOT NULL,
    image VARCHAR(100) NOT NULL,
    category_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE SET NULL
);

CREATE TABLE offers (
    id INT AUTO_INCREMENT,
    product_id INT NOT NULL,
    offer_percentage INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE
);

CREATE TABLE new (
    id INT AUTO_INCREMENT,
    product_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE
);

CREATE TABLE cart_item (
    id INT AUTO_INCREMENT,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    amount INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE
);

CREATE TABLE shipping (
    user_id INT NOT NULL,
    cost INT NOT NULL,
    max_delivery_time INT NOT NULL,
    PRIMARY KEY (user_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE
);


CREATE TABLE `order` (
    id VARCHAR(13),
    user_id INT NOT NULL,
    order_date DATE NOT NULL,
    latest_delivery DATE NOT NULL,
    total_cost FLOAT NOT NULL,
    completed BOOLEAN NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE
);

CREATE TABLE billing_address (
    order_id VARCHAR(13) NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    address VARCHAR(50),
    city VARCHAR(30),
    state VARCHAR(30),
    zip VARCHAR(10),
    PRIMARY KEY (order_id),
    FOREIGN KEY (order_id) REFERENCES `order`(id) ON DELETE CASCADE
);

CREATE TABLE payment_method (
    order_id VARCHAR(13) NOT NULL,
    name VARCHAR(100) NOT NULL,
    number VARCHAR(15) NOT NULL,
    exp_month VARCHAR(9) NOT NULL,
    exp_year INT NOT NULL,
    cvv INT NOT NULL,
    PRIMARY KEY (order_id),
    FOREIGN KEY (order_id) REFERENCES `order`(id) ON DELETE CASCADE
);

CREATE TABLE shipping_address (
    order_id VARCHAR(13) NOT NULL,
    address VARCHAR(50),
    city VARCHAR(30),
    state VARCHAR(30),
    zip VARCHAR(10),
    PRIMARY KEY (order_id),
    FOREIGN KEY (order_id) REFERENCES `order`(id) ON DELETE CASCADE
);

CREATE TABLE order_item (
    id INT AUTO_INCREMENT,
    order_id VARCHAR(13) NOT NULL,
    product_id INT NOT NULL,
    amount INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (order_id) REFERENCES `order`(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE
);

CREATE TABLE user_favourites (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE
);

INSERT INTO user (username, password, email, role)
VALUES
        ('admin', 'admin', '', 1),
        ('user', 'user', '', 2);

INSERT INTO user_info (User_ID)
VALUES
        (1),
        (2);

INSERT INTO category (name, icon)
VALUES 
    ('Vegan', 'sources/images/category_icons/vegan_icon.png'),
    ('Gluten Free', 'sources/images/category_icons/gluten_free_icon.png'),
    ('Snacks', 'sources/images/category_icons/snacks_icon.png'),
    ('Personal Care', 'sources/images/category_icons/personal_care_icon.png'),
    ('Pastries & Confectionery', 'sources/images/category_icons/confectionery_icon.png'),
    ('Spreads', 'sources/images/category_icons/spreads_icon.png');

INSERT INTO product (name, price, stock, description, image, category_id)
VALUES 
('Prune puree', 2.5, 100, 'Keep in a cool and dry place. After opening consume at once.', 'sources/images/products/Prune_puree.png' , 1),
('Rice flour burgers', 3.75, 50, 'Keep in a cool and dry place. Pour the mixture in a bowl and add 300g water and 3 tablespoons of oil. Mix the ingredients and make your burgers. Bake in the oven at 170C for 10-15 minutes.', 'sources/images/products/Rice_flour_burger.png' , 1),
('Rice hazelnut drink', 3.20, 100, 'The rice hazelnut drink have mixed sublimely light rice with intense hazelnuts for a delightful taste experience that you’ll wish you could enjoy by bites rather than sips!' , 'sources/images/products/Rice_hazelnut.png', 1),
('Peanut butter', 3.45, 100, 'Keep in a cool and dry place.', 'sources/images/products/Peanut_butter.png', 1),
('Turmeric powder', 1.36, 150, 'Keep in a cool and dark place.', 'sources/images/products/Turmeric_powder.png', 1),
('Almond oil', 7.8, 100, 'The edible organic almond oil of 7elements, is a 100% pure oil produced by the method of cold pressing. It is rich in vitamins E, K, oleic, linoleic acid and is filtered naturally, preserving all its nutrients.', 'sources/images/products/Almond_oil.png', 1),
('Soya chunks', 4.6, 100, 'Add soya chunks in boiling water or stock and soak for 10 minutes. Drain well and squeeze out excessive water.', 'sources/images/products/Soya_chunks.png', 1),
('Minced soya', 5.25, 100, 'Add minced soya in boiling water or stock and soak for 10 minutes. Drain and squeeze the excessive water.', 'sources/images/products/Minced_soya.png', 1),
('Rosehip kernel oil', 14.83, 100, 'The organic wild rose oil of 7elements, is produced from wild rose seeds, by the method of cold pressing. Deeply moisturizes the skin and smoothes wrinkles & fine lines, thanks to its high content of linoleic acid.', 'sources/images/products/Rosehip_kernel_oil.png', 1),
('Arnica oil', 10.28, 100, 'Organic arnica oil is produced by dissolving arnica flower extract in organic olive oil. Arnica oil is used externally to support the musculoskeletal system, due to its anti-inflammatory and antimicrobial properties. In addition, it is used as a massage oil on the scalp, as it stimulates circulation.', 'sources/images/products/Arnica_oil.png', 1),
('Apricot kernel oil', 9.83, 100, 'The edible organic apricot oil of 7elements, is produced from apricot kernels by the method of cold pressing. It is used raw in salads, in the preparation of sweet dishes but also in cooking. It also has moisturizing properties, while it is absorbed very quickly by the skin, leaving it soft and radiant.', 'sources/images/products/Apricot_kernel_oil.png', 1),
('Calendula oil', 9.83, 100, '7elements organic calendula oil is produced by the method of injecting organic calendula flowers in organic olive oil and stabilized with organic rosemary extract. It is known for its anti-inflammatory and healing properties, which make it ideal for the care of sensitive skin.', 'sources/images/products/Calendula_oil.png', 1),
('Castor Oil', 4.83, 100, '7elements organic castor oil is produced by the method of cold pressing. Particularly beneficial for hair health. Its nutrients contribute to the healthy growth of hair and skin. It is an excellent moisturizing product for the nails.', 'sources/images/products/Castor_Oil.png', 1),
('Black cumin oil', 9.83, 100, 'The edible organic oil black cumin of 7elements, is produced by the method of cold pressing. Raw consumption, plain or in salads and soups is widespread due to its soothing and antioxidant properties. It is also used for skin care.', 'sources/images/products/Black_cumin_oil.png', 1),
('Sesame oil', 5.32, 100, '7elements organic sesame oil, is used in cooking thanks to its resistance to high temperatures & its antioxidant properties. It is also beneficial for the skin as it has anti-aging & cleansing properties and is easily absorbed.', 'sources/images/products/Sesame_oil.png', 1),
('Shea butter', 7.77, 100, 'Organic and vegan shea butter is produced by the method of cold pressing from the fruits of the shea tree. Used for face, body and hair care, especially for dry and sensitive skin. Shea butter melts at body temperature.', 'sources/images/products/Shea_butter.png', 1),
('Cooking cream from almond', 1.59, 100, 'Keep in a cool and dry place. After opening keep refrigerated and consume within 5 days.', 'sources/images/products/cooking-cream-from-almond.png', 1),
('Tabbouleh', 3.00, 100, 'Keep in a cool and dry place.', 'sources/images/products/Tabbouleh.png', 1),
('Greek giant beans', 6.24, 100, 'Keep in a cool and dry place.', 'sources/images/products/Greek_giant_beans.png', 1),
('Fava beans from Grevena', 3.73, 100, 'Keep in a cool and dry place.', 'sources/images/products/Fava_beans_from_Grevena.png', 1),
('Chickpeas in water', 2.13, 100, 'A pantry essential and a great source of vegan protein, those buttery organic chickpeas are satisfyingly filling and deliciously moreish. Give homemade houmous a velvety texture, or let their creamy taste round off spicy dahls and wholesome stews. You can even spoon them through rice, couscous and salads to add nuttiness and a firm bite. Those organic chickpeas are made with no added sugar or salt, and are an excellent source of protein, making them well-suited to a vegan diet.', 'sources/images/products/Chickpeas_in_water.png', 1),
('Halva with coconut syrup', 1.63, 100, 'Keep in a cool and dry place.', 'sources/images/products/Halva_with_coconut_syrup.png', 1),
('Coconut water', 3.28, 100, 'After opening, keep refrigerate and consume within 2 days.', 'sources/images/products/Coconut_water.png', 1),
('Vine leaves', 6.66, 100, 'Statir vine leaves are harvested from vineyards of the sultana variety in central Halkidiki, combining tenderness, delicate texture and rich taste. They are packaged as soon as they are cut, thus preserving their freshness and light green color.', 'sources/images/products/Vine_leaves.png', 1),
('Red grape juice', 2.15, 100, 'Organic red grape juice, unfiltered, with a rich taste of fresh grapes. Due to its gentle processing and paper packaging, it offers intact freshness and retains the characteristics of fresh grapes. It has a high content of antioxidants and is suitable for grape therapy and of course for the preparation of fresh must flour. Served cool in fresh fruit and drink cocktails or separately.', 'sources/images/products/Red_grape_juice.png', 1),
('Pickled cucumber', 5.13, 100, 'Organic pickled cucumber with mustard seeds, agave syrup, dill, onion, and red pepper. Suitable for vegetarians and vegans.', 'sources/images/products/Pickled_cucumber.png', 1),
('Fava from lathouri', 2.98, 100, 'Keep in a cool and dry place.', 'sources/images/products/Fava_from_lathouri.png', 1),
('Chickpeas in brine', 1.78, 100, 'Keep in a cool and dry place. After opening keep in a cool place and consume within 2 days.', 'sources/images/products/Chickpeas_in_brine.png', 1),
('Jasmin green tea drink with pink grapefruit and lemon', 2.19, 100, 'HAKUMA Bitter is a 100% organic jasmine tea with refreshing pink grapefruit, citrus yuzu and quassia. The fruity taste and the combination of its ingredients rejuvenate your senses!', 'sources/images/products/Jasmin_green_tea_drink_with_pink_grapefruit_and_lemon.png', 1),
('Aloe juice', 1.81, 100, '', 'sources/images/products/Aloe_juice.png', 1),
('Coconut Sugar', 2.06, 100, 'Coconut sugar is a natural, unprocessed sweetener derived from the flowers of the coconut tree. Cocos nucifera, where coconut comes from, is one of the most productive and widespread plants in the world.', 'sources/images/products/Coconut_sugar.png', 2),
('Konjac Rice', 2.36, 100, 'Crazy about rice? We''ve got the perfect product for you! Made from all-natural organic gluten-free Konjac flour and organic oat fibre, Slim Rice is a low-calorie alternative that helps you lose weight without compromising on taste.', 'sources/images/products/Konjac_rice.png', 2),
('Konjac Spaghetti', 2.40, 100, 'The Konjac spaghetti is made from all-natural organic konjac flour and gluten-free organic oat fibre. Slim Pasta Spaghetti is a low-calorie alternative that helps you lose weight without compromising on taste.', 'sources/images/products/Konjac_spaghetti.png', 2),
('Gluten free oat flakes', 3.43, 100, 'Keep in a cool and dry place.', 'sources/images/products/Gf_oat_flakes.png', 2),
('Nutritional yeast flakes', 6.39, 100, 'Keep in a cool and dry place. Dissolve it in water, milk, fruits, juices, vegetables, for sprinkling in sοups, boiled, cook, salads and cereals.', 'sources/images/products/Nutr_yeast_flakes.png', 2),
('Oat drink', 3.01, 100, 'Gluten free oat drink, a source of fibre, without added sugars and appreciated by vegetarians and vegans for its nutritional qualities and taste.', 'sources/images/products/Gf_oat_drink.png', 2),
('Yeast powder', 0.93, 100, 'Biovegan yeast powder is organic, gluten free, lactose free and GMO free.', 'sources/images/products/Yeast_powder.png', 2),
('Konjac noodles', 2.26, 100, 'Made from all-natural organic Konjac flour and gluten-free organic oat, Slim Noodles is a low-calorie alternative that helps you lose weight without compromising on taste. Its unique blend keeps you satiated for an extended period of time.', 'sources/images/products/Konjac_noodles.png', 2),
('Gluten free mini tricolored penne with quinoa and amaranth', 5.55, 100, 'Keep in a cool and dry place.', 'sources/images/products/Gluten_free_mini_tricolored_penne_with_quinoa_and_amaranth.png', 2),
('Fusilli pasta from pea and quinoa', 4.36, 100, 'Keep in a cool and dry place.', 'sources/images/products/Fusilli_pasta_from_pea_and_quinoa.png', 2),
('Gluten free penne with wholegrain rice, quinoa and amaranth', 4.36, 100, 'Keep in a cool and dry place.', 'sources/images/products/Gluten_free_penne_with_wholegrain_rice_quinoa_and_amaranth.png', 2),
('Gluten free tortiglioni with buckwheat', 3.69, 100, 'Keep in a cool and dry place.', 'sources/images/products/Gluten_free_tortiglioni_with_buckwheat.png', 2),
('Rice vinegar Yutaka', 3.92, 100, 'Keep in a cool and dry place.', 'sources/images/products/Rice_vinegar_Yutaka.png', 2),
('Mild mustard', 2.78, 100, 'After opening keep it in the refrigerator.', 'sources/images/products/Mild_mustard.png', 2),
('Crunchy mustard', 2.78, 100, 'After opening keep it in the refrigerator.', 'sources/images/products/Crunchy_mustard.png', 2),
('Gluten free multigrain spaghetti', 3.29, 100, 'Keep in a cool and dry place, away from the light and heat.', 'sources/images/products/gluten-free-multigrain-spaghetti.png', 2),
('Gluten free buckwheat spaghetti', 3.29, 100, 'Keep in a cool and dry place, away from the light and heat.', 'sources/images/products/gluten-free-buckwheat-spaghetti.png', 2),
('Gluten free rice mayonnaise', 3.99, 100, 'Keep in a cool and dry place. After opening, keep in the refrigerator and consume shortly.', 'sources/images/products/gluten-free-rice-mayonnaise.png', 2),
('Gluten free yellow lentils penne', 3.97, 100, 'Keep in a cool and dry place, away from the light and heat.', 'sources/images/products/gluten-free-yellow-lentils-penne.png', 2),
('Gluten free red lentils fusilli', 3.97, 100, 'Keep in a cool and dry place, away from the light and heat.', 'sources/images/products/gluten-free-red-lentils-fusilli.png', 2),
('Mustard for kids', 3.89, 100, 'After opening keep it in the refrigerator.', 'sources/images/products/mustard-for-kids.png', 2),
('Ketchup for kids gluten free', 3.81, 100, '', 'sources/images/products/ketchup-for-kids-gluten-free.png', 2),
('Ketchup', 5.18, 100, 'After opening keep it in the refrigerator.', 'sources/images/products/Ketchup.png', 2),
('Japanese Kuru root', 10.92, 100, 'Keep in a cool and dry place.', 'sources/images/products/japanese-kuru-root.png', 2),
('Falafel mix', 3.01, 100, 'Keep in a cool and dry place.', 'sources/images/products/falafel-mix.png', 2),
('Polenta', 2.79, 100, 'Keep in a cool and dry place.', 'sources/images/products/polenta.png', 2),
('Wholegrain oat flakes with apple and cinnamon', 4.27, 100, 'Keep in a cool and dry place.', 'sources/images/products/wholegrain-oat-flakes-with-apple-and-cinnamon.png', 2),
('Oat and buckwheat flakes', 5.62, 100, 'Keep in a cool and dry place.', 'sources/images/products/oat-and-buckwheat-flakes.png', 2),
('Gluten free wholegrain rice spaghetti', 2.78, 100, 'Keep in a cool and dry place, away from light and heat. ', 'sources/images/products/gluten-free-wholegrain-rice-spaghetti.png', 2),
('Tricolored fusilli pasta gluten free', 2.57, 100, 'Keep in a cool and dry place.', 'sources/images/products/tricolored-fusilli-pasta-gluten-free.png', 2),
('Dino Chips', 1.65, 100, 'Give your children a unique dinosaur-shaped chips snack and cheese flavor. Made with lentils and corn, gluten free and high in fiber.', 'sources/images/products/Dino_chips.png', 3),
('Carrot Stix', 1.25, 100, 'Organic corn snack with carrot and herbs. It has a unique taste while being prepared from 100% organic ingredients. Suitable for children over 10 months.', 'sources/images/products/Carrot_stix.png', 3),
('Fruit Bar', 1.45, 100, 'Organic fruit bar with pear and apple. Keep in a cool and dry place.', 'sources/images/products/Fruit_bar.png', 3),
('Red Velvet Biscuit', 1.25, 100, 'Raw biscuit with cocoa and almonds from Leya''s Cookies. The raw cocoa biscuit with soft creamy cream is delicious and satisfies the desire for something sweet on a busy day.', 'sources/images/products/Velvet_biscuit.png', 3),
('Corn Cakes', 1.10, 100, 'Keep in a cool and dry place.', 'sources/images/products/Corn_cakes.png', 3),
('Dried Blueberry', 4.69, 100, 'Keep in a cool and dark place. After opening keep refrigerated.', 'sources/images/products/Dried_blueberry.png', 3),
('Dried Mulberries', 2.54, 100, 'Keep in a cool and dry place.', 'sources/images/products/Dried_mulberries.png', 3),
('Black Raisin', 1.99, 100, 'Keep in a cool and dry place.', 'sources/images/products/Black_raisin.png', 3),
('Pecan walnut', 7.30, 100, 'Keep in a cool and dry place.', 'sources/images/products/pecan-walnut.png', 3),
('Dried dates with pit', 2.83, 100, 'Keep in a cool and dry place.', 'sources/images/products/dried-dates-with-pit.png', 3),
('Walnut kernel', 5.90, 100, 'Keep in a cool and dry place.', 'sources/images/products/walnut-kernel.png', 3),
('Brazil walnut', 5.41, 100, 'Keep in a cool and dry place.  Close the package tightly after opening.', 'sources/images/products/brazil-walnut.png', 3),
('Pitted dried plumps', 7.95, 100, 'Keep in a cool and dry place.', 'sources/images/products/pitted-dried-plumps.png', 3),
('Pitted dried dates', 3.79, 100, 'Keep in a cool and dry place.', 'sources/images/products/pitted-dried-dates.png', 3),
('Cashews pistachio', 4.40, 100, 'Close the package tightly after opening.', 'sources/images/products/cashews-pistachio.png', 3),
('Sultana raisin', 2.02, 100, '', 'sources/images/products/sultana-raisin.png', 3),
('Dried aronia melanocarpa', 3.32, 100, 'Keep in a cool and dry place.', 'sources/images/products/dried-aronia-melanocarpa.png', 3),
('Roasted pumpkin seeds', 6.47, 100, 'Keep in a cool and dry place.', 'sources/images/products/roasted-pumpkin-seeds.png', 3),
('Dried pitted dates', 4.80, 100, 'Keep in a cool and dry place.', 'sources/images/products/dried-pitted-dates.png', 3),
('Dry figs', 3.58, 100, 'Keep in a cool and dry place.', 'sources/images/products/dry-figs.png', 3),
('Maqui berry powder', 23.39, 100, 'Keep in a cool and dry place.', 'sources/images/products/maqui-berry-powder.png', 3),
('Cranberry powder', 9.45, 100, 'Keep in a cool and dry place.', 'sources/images/products/cranberry-powder.png', 3),
('Raw almond from Grevena', 5.95, 100, 'Keep in a cool and dark place. Once opened keep in the refrigerator for up 6 month & no after expiration date.', 'sources/images/products/raw-almond-from-grevena.png', 3),
('Corn for pop corn', 1.35, 100, 'Keep in a cool and dry place.', 'sources/images/products/corn-for-pop-corn.png', 3),
('Wholegrain oatcakes', 2.39, 100, 'Keep in a cool and dry place.', 'sources/images/products/wholegrain-oatcakes.png', 3),
('Hummus chips with cream dill flavor', 3.24, 100, 'Keep in a cool, dry and shady place.', 'sources/images/products/hummus-chips-with-cream-dill-flavor.png', 3),
('Quinoa chips with sundried tomato and garlic flavor', 3.24, 100, 'Keep in a cool and dry place.', 'sources/images/products/quinoa-chips-with-sundried-tomato-and-garlic-flavor.png', 3),
('Hummus tomato & basil chips', 3.24, 100, '', 'sources/images/products/hummus-tomato-basil-chips.png', 3),
('Rice cake with 4 cereals', 1.63, 100, 'Keep in a cool and dry place. Once opened, store in an airtight container.', 'sources/images/products/rice-cake-with-4-cereals.png', 3),
('Quinoa chips with chili-lime flavor', 3.24, 100, 'Keep in a cool and dry place.', 'sources/images/products/quinoa-chips-with-chili-lime-flavor.png', 3),
('Olive soap', 1.58, 100, 'Pure, natural soap from olive oil, with salt and natural aroma.', 'sources/images/products/Olive_soap.png', 4),
('Lice shampoo', 13.70, 100, 'This shampoo contains neem oil, which soothes itching and sweet almond oil, which smoothes and gives a light shine to your hair.', 'sources/images/products/Lice_shampoo.png', 4),
('Natural beeswax', 5.38, 50, '100% natural beeswax for cosmetic use. It is an amazing natural substance that can be used in many ways.', 'sources/images/products/Beeswax.png', 4),
('Eucalyptus essential oil', 5.45, 50, 'Eucalyptus essential oil makes it easier to breathe consciously during the cold season. Offers relief and provides nourishment for dry skin.', 'sources/images/products/Eucalyptus_oil.png', 4), 
('Jojoba oil', 8.85, 100, '7elements organic jojoba oil is produced by the method of cold pressing. Its high content of fat and vitamin E by-products offers protection and softness. It has moisturizing properties and is absorbed very quickly by the skin. In addition, jojoba oil increases the shelf life of blends.', 'sources/images/products/Jojoba_oil.png', 4),
('Rose olive soap', 1.58, 100, 'Pure, natural soap from olive oil, with salt and natural aroma.', 'sources/images/products/Rose_soap.png', 4),
('Carrot oil', 6.03, 100, 'Essential carrot oil, ideal for tanning and moisturizing. With a high content of vitamins B, C, D, E, and especially antioxidant beta-carotene. Suitable for use against premature aging, itching, burns, dryness, psoriasis and eczema. Protects skin affected by vitiligo when exposed to sunlight.', 'sources/images/products/Carrot_oil.png', 4),
('Rose water', 6.21, 100, 'Organic rose water suitable for culinary & cosmetic use. Moisturizes, rejuvenates, cleanses and tightens the skin.', 'sources/images/products/Rose_water.png', 4),
('Anti-ageing eye cream with mallow and shea butter', 14.31, 100, 'This anti-aging eye cream contains coenzyme Q10 which gently smoothes the sensitive eye area. When used regularly, it has been observed that the depth of wrinkles is significantly reduced and the elasticity of the skin is improved.', 'sources/images/products/Anti-ageing_eye_cream_with_mallow_and_shea_butter.png', 4),
('Toothpaste with aloe vera, tea tree and mint', 6.45, 100, 'Unique composition with Aloe Vera for soothing action, tea tree oil for antiseptic action, mint and lemon for fresh breath, and natural rejuvenation. Helps prevent tooth decay, dental plaque, and bad breath. Fluoride-free and SLS, Gluten-Free, GMO-Free, Vegan', 'sources/images/products/Toothpaste_with_aloe_vera,_tea_tree_and_mint.png', 4),
('Shaving foam with bamboo and aloe vera', 7.28, 100, 'With organic bamboo & organic aloe, lavera shaving foam is suitable for sensitive men''s skin and offers a soft and perfect look. The new lavera formula is ideal for a gentle shave thanks to organic aloe, nourishing olive oil and bisabolol, which prevents irritation. At the same time, the extracts of organic green tea and chamomile soothe the skin, while the organic bamboo prevents redness and redness.', 'sources/images/products/shaving-foam-with-bamboo-and-aloe-vera.png', 4),
('Natural toothpaste with mint', 6.45, 100, 'The natural Toothpaste with Mint offers fresh and cool breath. It helps prevent the natural rejuvenating element. The fennel helps tighten the gums. Fluoride-free and SLS, Gluten-Free, GMO-Free, Vegan', 'sources/images/products/natural-toothpaste-with-mint.png', 4),
('Hand and body lotion with cocoa butter', 13.65, 100, 'This botanically rich, non-greasy daily JĀSÖN® Cocoa Butter Lotion naturally delivers deep, long-lasting hydration. Our natural blend of intensive Cocoa Butter, Sunflower Oil and soothing Chamomile Extract softens and helps relieve extremely dry, rough skin. With use, skin is nurtured back to smooth, pampered comfort.', 'sources/images/products/hand-and-body-lotion-with-cocoa-butter.png', 4),
('Hand and body lotion with aloe vera', 13.65, 100, 'JĀSÖN® Aloe Vera Body Lotion is botanically rich, non-greasy daily lotion that naturally delivers deep, long-lasting hydration. Highly concentrated, soothing Aloe Vera Gel instantly relieves discomforts of dry, irritated, sun damaged or newly shaven skin. With use, skin is calmed, balanced and nurtured back to its healthy-looking best.', 'sources/images/products/hand-and-body-lotion-with-aloe-vera.png', 4),
('Hand soap with tea tree', 9.75, 100, 'This botanical JĀSÖN® Tea Tree Soap gently cleanses and safely nourishes your skin with Vitamin E and Pro-Vitamin B5. Our natural blend of Tea Tree Oil and Calendula Extract balances, purifies, and soothes your skin.', 'sources/images/products/hand-soap-with-tea-tree.png', 4),
('Hand soap with lavender', 9.75, 100, 'This unique liquid soap gently cleanses while nourishing the skin with Vitamin E and Provitamin B5. Combination of organic Aloe with Provence Lavender relaxes the senses and gives skin soft and balanced.', 'sources/images/products/hand-soap-with-lavender.png', 4),
('Shampoo for kids', 14.75, 100, 'Make bath time fun again. Our specially formulated shampoo is tough on dirt, yet gentle on young, tender scalps and always tear-free. A soothing blend of Chamomile and Marigold cleanses while Hydrolyzed Wheat Proteins smooth and strengthen your little one''s hair. A bubble gum scent will make them smile. Happy kids, happy hair.', 'sources/images/products/shampoo-for-kids.png', 4),
('Shampoo with tea tree', 14.75, 100, 'This normalizing shampoo gently cleanses and nourishes to minimize dry, flakey skin build-up on the scalp. Australian Tea Tree Oil, known for its antibacterial and anti-fungicidal properties, is combined with Grapefruit Extract and protein to purify and fortify hair follicles while soothing Calendula, Hops, Sage Extracts and Wheat Germ Oil, helps relieve discomfort of itchiness. Gentle enough to use every day, hair is soft with added volume, luster and manageability.', 'sources/images/products/shampoo-with-tea-tree.png', 4),
('Hair gel with aloe vera', 9.05, 100, 'JĀSÖN® 98% Pure Aloe Vera Gel relieves discomforts of dry, irritated, sun damaged or newly shaven skin while nourishing Allantoin and Vitamin B5 replenish moisture.', 'sources/images/products/hair-gel-with-aloe-vera.png', 4),
('Body wash with aloe vera', 15.60, 100, 'This gentle JĀSÖN® Aloe Vera Body Wash cleanses with natural botanical surfactants and safely nourishes with Vitamin E and Pro-Vitamin B5. Our natural blend of soothing Aloe Vera and Sunflower Seed Oil provides lipid relief to smooth and hydrate your skin.', 'sources/images/products/body-wash-with-aloe-vera.png', 4),
('Body wash with rosewater', 15.60, 100, 'This Jason Rosewater Body Wash cleanses with natural botanical surfactants and safely nourishes with Vitamin E and Pro-Vitamin B5. Our natural blend of invigorating Rosewater and soothing Calendula Extract keeps your body refreshed, smooth and uplifted.', 'sources/images/products/body-wash-with-rosewater.png', 4),
('Moisturizing cream with vitamin E 5000 IU', 13.65, 100, 'This botanically-rich Vitamin E Face Cream naturally delivers deep, long-lasting moisturization and effectively helps revitalize dull, dehydrated skin. Soothing Vitamin E plus all-natural Wheat Germ and Avocado Oils rehydrate and renew skin’s softness.', 'sources/images/products/moisturizing-cream-with-vitamin-e-5000-iu.png', 4),
('Lip balm', 3.35, 100, 'Give your beautiful lips the care they deserve. Organic jojoba, in combination with organic almond oil, nourishes chapped lips, while organic candles and shea butter protect against external conditions, especially during the winter.', 'sources/images/products/lip-balm.png', 4),
('Lip balm with pomegranate and argan oil', 4.35, 100, 'Lavera''s lip balm repair with organic pomegranate and high quality organic Brazil nuts, rejuvenates dry lips. The special care formula prevents cracking of the lips, offers softness that lasts and increases the elasticity of the lips. To make your lips look healthy and beautiful, even when they''re dry and cold.', 'sources/images/products/lip-balm-with-pomegranate-and-argan-oil.png', 4),
('Nappy cream with evening primrose and zinc', 4.35, 100, 'This protection cream with zinc and a composition of four precious organic vegetable oils soothes the skin and creates a protective mantle, which cares for the skin and protects the sensitive area from congestion by removing moisture. The diaper change cream is extremely gentle on the sensitive skin of the diaper area, as it does not contain synthetic perfumes, dyes or preservatives.', 'sources/images/products/nappy-cream-with-evening-primrose-and-zinc.png', 4),
('Face oil with essential oil for irritated skin and acne', 11.90, 100, 'Facial oil for irritated skin-acne, is suitable for irritated skin, acne, with essential oils of tea tree, lavender and geranium based on vegetable glycerin.', 'sources/images/products/face-oil-with-essential-oil-for-irritated-skin-and-acne.png', 4),
('Concentrate oil for matured skin with rose', 11.90, 100, 'The face oil for mature skin with rose, is suitable for mature skin. Helps prevent and treat wrinkles and gives deep hydration to dry skin.', 'sources/images/products/concentrate-oil-for-matured-skin-with-rose.png', 4),
('Face oil with essential oil for mixed skin', 11.90, 100, 'The face oil with lemon and mandarin, is suitable for combination skin.', 'sources/images/products/face-oil-with-essential-oil-for-mixed-skin.png', 4),
('Deodorant crystal (spray)', 8.95, 100, 'Deodorant crystal by Bio Leon, is a 100% natural, hypoallergenic product, free of aluminum, alcohol, preservatives and synthetic additives. Offers 24-hour protection.', 'sources/images/products/deodorant-crystal-spray.png', 4),
('Pineapple and lemon shower gel', 12.80, 100, 'Sante''s shower gel contains organic pineapple & lemon extract. Revitalizes the senses with its delicate citrus aroma, gently and deeply cleanses the skin with selected surfactants of plant origin. The valuable treatment composition with organic pineapple extract and organic aloe vera juice provides intensive moisture and leaves the skin wonderfully soft. It is mild, fruity and fresh.', 'sources/images/products/pineapple-and-lemon-shower-gel.png', 4),
('Maple Syrup', 6.55, 100, 'Maple syrup, a real Institute in Canada (widely used as an accompaniment to pancakes and crepes, while the leaf of the tree adorns the flag of the country) and has healing properties similar to those of bilberry, green tea and other "superfoods".', 'sources/images/products/Maple_syrup.png', 5),
('Dry yeast', 0.99, 100, 'Keep in a cool and dry place. Each sachet corresponds to 25g of fresh yeast for 500g of flour.', 'sources/images/products/Dry_yeast.png', 5),
('Chocolate croissant', 1.18, 100, '', 'sources/images/products/Croissant.png', 5),
('Cocoa powder', 2.36, 100, 'This organic cocoa powder will offer you wonderful drinks and sweets. Cocoa is good for your health and is considered a superfood, as it is a natural source of magnesium and rich in vitamins, salts, phosphorus, iron & minerals.', 'sources/images/products/Cocoa_powder.png', 5),
('Baking powder', 1.05, 100, 'Keep in a cool and dry place.', 'sources/images/products/Baking_powder.png', 5),
('Wheat bread in slices', 3.36, 100, 'Keep in a cool and dry place. After opening consume within few days.', 'sources/images/products/Wheat_bread.png', 5),
('Corn pizza base', 2.23, 100, 'Keep in cool and dry place. Once opened keep it in the refrigerator and consume within 2 days. Put your favourite topping in the top of the unwrapped pizza base and bake it in an preheated oven at 190 ºC for about 10-12 mins.', 'sources/images/products/Pizza_base.png', 5),
('Oat crackers', 1.62, 100, 'Keep in a cool and dry place.', 'sources/images/products/Oat_crackers.png', 5),
('Milk chocolate drops', 3.33, 100, 'Keep in a cool and dry place.', 'sources/images/products/milk-chocolate-drops.png', 5),
('Dark chocolate drops', 2.98, 100, 'Keep in a cool and dry place.', 'sources/images/products/dark-chocolate-drops.png', 5),
('Maple syrup grade A', 9.77, 100, 'Keep in a cool and dry place. After opening keep refrigerated.', 'sources/images/products/maple-syrup-grade-a.png', 5),
('Agave syrup', 5.07, 100, 'Keep in a cool and dry place.', 'sources/images/products/agave-syrup.png', 5),
('Agave syrup with maple', 7.57, 100, 'Keep in a cool and dry place. After opening keep refrigerated.', 'sources/images/products/agave-syrup-with-maple.png', 5),
('Corn starch (niseste)', 2.24, 100, 'Keep in a cool and dry place.', 'sources/images/products/corn-starch-niseste.png', 5),
('Vanilla Bourbon stick', 11.79, 100, 'Keep in a cool and dry place.', 'sources/images/products/vanilla-bourbon-stick.png', 5),
('Ground vanilla bourbon', 22.34, 100, 'Keep in a cool and dry place.', 'sources/images/products/ground-vanilla-bourbon.png', 5),
('Bourbon vanilla powder', 6.35, 100, 'Keep in a cool and dry place.', 'sources/images/products/Bourbon_vanilla_powder.png', 5),
('Agar agar', 4.23, 100, 'Keep in a cool and dry place.', 'sources/images/products/Agar_agar.png', 5),
('Guar gum', 3.31, 100, 'Keep in a cool and dry place.', 'sources/images/products/Guar_gum.png', 5),
('Dessert creme vanille', 1.84, 100, '', 'sources/images/products/Dessert_creme_vanille.png', 5),
('Baking soda', 0.80, 100, 'Keep in a cool and dry place.', 'sources/images/products/baking-soda.png', 5),
('Food colours', 7.21, 100, 'Mix the colour with 1 tablespoon of semi hot water, the green colour with 2 tablespoons of water and mix well. Leave the mixture to rest for 5 minutes and mix again add drop by drop the liquid colour in your recipe until you have the color result you want.', 'sources/images/products/food-colours.png', 5),
('Mixture for chocolate ice cream in powder', 2.94, 100, 'Keep in a cool and dry place.', 'sources/images/products/mixture-for-chocolate-ice-cream-in-powder.png', 5),
('Wheat rusks', 4.55, 100, 'Keep in a cool and dry place.', 'sources/images/products/wheat-rusks.png', 5),
('Emmer wheat rusks no salt added', 5.65, 100, 'Keep in a cool and dry place.', 'sources/images/products/emmer-wheat-rusks-no-salt-added.png', 5),
('Dinkel rusks', 5.65, 100, 'Keep in a cool and dry place.', 'sources/images/products/dinkel-rusks.png', 5),
('Rusks with olive oil and carob', 4.12, 100, 'Keep in a cool and dry place.', 'sources/images/products/rusks-with-olive-oil-and-carob.png', 5),
('Pizza base with dinkel flour', 5.32, 100, 'Biona organic spelt pizza bases are a nutritious and simple start of a meal, just add your own toppings to make your pizza exactly how you like it.', 'sources/images/products/pizza-base-with-dinkel-flour.png', 5),
('Rye rusks', 4.92, 100, 'Keep in a cool and dry place.', 'sources/images/products/rye-rusks.png', 5),
('Small rusks with carob flour', 4.86, 100, 'Keep in a cool and dry place.', 'sources/images/products/small-rusks-with-carob-flour.png', 5),
('Almond butter', 7.62, 100, 'Keep in a cool and dark place.', 'sources/images/products/Almond_butter.png', 6),
('Unhulled tahini', 8.16, 100, 'Keep in a cool and shady place.', 'sources/images/products/Unhulled_tahini.png', 6),
('Wholegrain tahini', 8.18, 100, 'Keep in a cool and dry place.', 'sources/images/products/Wholegrain_tahini.png', 6),
('Strawberry jam', 4.97, 100, '', 'sources/images/products/Strawberry_jam.png', 6),
('Apricot spread', 4.19, 100, 'Keep in a cool and dry place. After opening keep refrigerated and consume within 20 days.', 'sources/images/products/Apricot_spread.png', 6),
('Ghee butter', 10.97, 100, 'Keep in a cool and dry place. Ideal for cooking', 'sources/images/products/Ghee_butter.png', 6),
('Vegalina hazelnut praline', 7.16, 100, 'Keep in a cool and dry place.', 'sources/images/products/Vegalina_praline.png', 6),
('Tahini with honey', 4.41, 100, 'Keep in a cool and dry place.', 'sources/images/products/Tahini_honey.png', 6),
('Coconut spread', 7.72, 100, 'Keep in a cool and dry place.', 'sources/images/products/coconut-spread.png', 6),
('Strawberry spread', 4.30, 100, 'Keep in a cool and dry place. After opening keep it in the refrigerator and consume immediately.', 'sources/images/products/strawberry-spread.png', 6),
('Cherry spread', 4.92, 100, 'Keep in a cool and dry place. After opening keep refrigerated and consume within 10 days.', 'sources/images/products/cherry-spread.png', 6),
('Orange spread', 4.39, 100, 'Keep in a cool and dry place. After opening keep it in the refrigerator for 10 days.', 'sources/images/products/orange-spread.png', 6),
('Kiwi spread', 3.53, 100, '', 'sources/images/products/kiwi-spread.png', 6),
('Peach spread', 4.19, 100, 'Keep in a cool and dry place. After opening keep refrigerated for 20 days.', 'sources/images/products/peach-spread.png', 6),
('Plum spread', 4.97, 100, 'Keep in a cool and dark place. After opening keep refrigerated for 20 days.', 'sources/images/products/plum-spread.png', 6),
('Wild blueberry spread', 4.31, 100, 'Keep in a cool and dry place. After opening keep it in the refrigerator and consume immediately.', 'sources/images/products/wild-blueberry-spread.png', 6),
('Dark chocolate spread', 5.08, 100, 'Rich, dark, and tempting, nothing quite beats the irresistible taste of the Biona Organic Dark Cocoa Spread. Vegan-friendly and made using organic ingredients, the spread is ideal for everything from mixing into cake icing to lavishing on your morning toast – perfect for the chocoholics in your household.', 'sources/images/products/dark-chocolate-spread.png', 6),
('Bionella chocolate spread', 7.21, 100, 'Keep in a cool and dry place.', 'sources/images/products/bionella-chocolate-spread.png', 6),
('Chocolate and hazelnut spread', 6.84, 100, 'Keep in a cool and dry place.', 'sources/images/products/chocolate-and-hazelnut-spread.png', 6),
('Chocolate with hazelnuts spread', 5.87, 100, 'Keep in a cool and dry place.', 'sources/images/products/chocolate-with-hazelnuts-spread.png', 6),
('Coconut spread with cacao', 8.91, 100, 'Keep in a cool and dry place.', 'sources/images/products/coconut-spread-with-cacao.png', 6),
('Orange and ginger spread', 4.97, 100, 'Keep in a cool and dry place. After opening keep refrigerated for 20 days.', 'sources/images/products/orange-and-ginger-spread.png', 6),
('Spread with hazelnut and cacao', 4.27, 100, 'Enjoy the spread with hazelnut and cocoa, for a delicious snack during your day.', 'sources/images/products/spread-with-hazelnut-and-cacao.png', 6),
('Spread with tahini, couverture & honey', 4.59, 100, '', 'sources/images/products/spread-with-tahini-couverture-honey.png', 6),
('Peanut butter without added salt', 7.57, 100, 'Keep in a cool and dry place.', 'sources/images/products/peanut-butter-without-added-salt.png', 6),
('Cacao butter', 10.18, 100, 'Organic and vegan cocoa butter is a superfood with high antioxidant activity. It is traditionally used to make chocolate. It is also ideal for the treatment of dry skin as it enhances the elasticity and firmness of the skin.', 'sources/images/products/cacao-butter.png', 6),
('Crunchy peanut butter', 4.20, 100, 'Biona Organic Crunchy Peanut Butter is milled from small batches of freshly roasted certified organic peanuts, a touch of sea salt - and that’s it!  Our Crunchy Peanut Butter has a wonderful flavor and is a great source of protein. Spread over fresh, hot toast; dollop onto porridge, stir into yogurt, smoothies or add to cookie dough in baking!', 'sources/images/products/crunchy-peanut-butter.png', 6),
('Black sesame tahini', 7.49, 100, 'Keep in a cool and dry place. After opening, consume within 3 months.', 'sources/images/products/black-sesame-tahini.png', 6),
('Almond & coconut butter', 9.77, 100, 'Keep in a cool and dry place.', 'sources/images/products/almond-coconut-butter.png', 6),
('Hazelnut butter', 10.18, 100, 'Keep in a cool and dry place.', 'sources/images/products/hazelnut-butter.png', 6);

INSERT INTO offers (product_id, offer_percentage)
VALUES 
        (4,20),
        (5,70),
        (2,20),
        (6,35),
        (11,20),
        (12,45),
        (9,20),
        (14,25);

INSERT INTO new (product_id)
VALUES 
        (5),
        (10),
        (15),
        (20),
        (25),
        (30),
        (35);