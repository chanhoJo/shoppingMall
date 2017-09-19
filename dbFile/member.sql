create table member (
  id VARCHAR(10) NOT NULL,
  pass VARCHAR(10) NOT NULL,
  member_name VARCHAR(10),
  address VARCHAR(50),
  gender VARCHAR(5),
  phone VARCHAR(15),
  email VARCHAR(50),
  point INT,
  grade VARCHAR(10),
  PRIMARY KEY (id)
);

INSERT INTO member VALUES ("admin", "1234", "admin", "", "", "", "", 0 ,"admin");
INSERT INTO member VALUES ("yagato93", "1212", "Jochanho", "home", "male", "010-3650-8923", "yagato93@gmail.com", 0 ,"common");