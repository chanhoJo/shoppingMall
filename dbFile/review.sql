create table review(
  review_no INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  review_title VARCHAR(100) NOT NULL,
  review_content TEXT,
  review_date DATETIME NOT NULL,
  review_count INT NOT NULL,
  review_writer VARCHAR(10) NOT NULL,
  review_file TEXT
);

insert into review values(null, "good", "good product", now(), 0, "yagato93", "");
insert into review values(null, "Yeah", "Yeah product", now(), 0, "yagato93", "");

