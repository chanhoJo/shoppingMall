CREATE TABLE product (
  no INT AUTO_INCREMENT,
  product_name VARCHAR(100) NOT NULL,
  price INT NOT NULL,
  type VARCHAR(15) NOT NULL,
  size VARCHAR(10),
  buy_count INT,
  click_count INT,
  point INT,
  PRIMARY KEY(no)
);

INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("top1", 10000,"top", "L", 1, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("top2", 20000,"top", "M", 5, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("top3", 30000,"top", "S", 9, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("top4", 40000,"top", "XL", 8, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("top5", 50000,"top", "XXL", 7, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("top6", 60000,"top", "XL", 10, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("top7", 70000,"top", "L", 7, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("top8", 60000,"top", "XL", 10, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("top9", 70000,"top", "L", 7, 0, 1);

INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("outer1", 100000,"outer", "L", 1, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("outer2", 200000,"outer", "M", 5, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("outer3", 300000,"outer", "S", 9, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("outer4", 400000,"outer", "XL", 8, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("outer5", 500000,"outer", "XXL", 7, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("outer6", 600000,"outer", "XL", 10, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("outer7", 700000,"outer", "L", 7, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("outer8", 600000,"outer", "XL", 10, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("outer9", 700000,"outer", "L", 7, 0, 1);

INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("shoes1", 150000,"shoes", "220", 1, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("shoes2", 250000,"shoes", "230", 5, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("shoes3", 350000,"shoes", "240", 9, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("shoes4", 450000,"shoes", "250", 8, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("shoes5", 550000,"shoes", "260", 7, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("shoes6", 650000,"shoes", "270", 10, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("shoes7", 750000,"shoes", "280", 7, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("shoes8", 650000,"shoes", "270", 10, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("shoes9", 750000,"shoes", "280", 7, 0, 1);

INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("eyewear1", 11000,"eyewear", "none", 1, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("eyewear2", 21000,"eyewear", "none", 2, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("eyewear3", 31000,"eyewear", "none", 3, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("eyewear4", 41000,"eyewear", "none", 4, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("eyewear5", 51000,"eyewear", "none", 5, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("eyewear6", 61000,"eyewear", "none", 6, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("eyewear7", 71000,"eyewear", "none", 7, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("eyewear8", 61000,"eyewear", "none", 6, 0, 1);
INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES ("eyewear9", 71000,"eyewear", "none", 7, 0, 1);


