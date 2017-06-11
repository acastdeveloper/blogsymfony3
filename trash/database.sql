CREATE DATABASE IF NOT EXIST blog;

USE blog;

CREATE TABLE users(
  id INT(255) AUTO_INCREMENT NOT NULL,
  role VARCHAR(20),
  name VARCHAR(255),
  surname VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255),
  image VARCHAR(255),
  CONSTRAINT pk_users PRIMARY KEY(id)
) ENGINE=InnoDb;


CREATE TABLE categories (
  id INT(255) AUTO_INCREMENT NOT NULL,
  name VARCHAR(255),
  description TEXT,
  CONSTRAINT pk_categories PRIMARY KEY(id)
) ENGINE=InnoDb;

CREATE TABLE entries(
  id INT(255) AUTO_INCREMENT NOT NULL,
  user_id INT(255) NOT NULL,
  category_id INT(255) NOT NULL,
  title VARCHAR(255),
  content TEXT,
  status VARCHAR(20),
  image VARCHAR(255),
  CONSTRAINT pk_entries PRIMARY KEY(id),
  CONSTRAINT fk_entries_users FOREIGN KEY(user_id) references users(id),
  CONSTRAINT fk_entries_cateogries FOREIGN KEY(category_id) references categories(id)
) ENGINE=InnoDb;

CREATE TABLE tags(
  id INT(255) AUTO_INCREMENT NOT NULL,
  name VARCHAR(255),
  description VARCHAR(255),
  CONSTRAINT pk_tags PRIMARY KEY(id)
) ENGINE=InnoDb;

CREATE TABLE entry_tag(
  id INT(255) AUTO_INCREMENT NOT NULL,
  entry_id INT(255) NOT NULL,
  tag_id INT(255) NOT NULL,
  CONSTRAINT pk_entry_tag PRIMARY KEY(id),
  CONSTRAINT fk_entry_tag_entries FOREIGN KEY(entry_id) references entries(id),
  CONSTRAINT fk_tag_id_tags FOREIGN KEY(tag_id) references tags(id)  
) ENGINE=InnoDb;





/* ALGUNES CONSULTES */

/*USE testingmultiverse_blogsymfony3;*/

/*SELECT * FROM testingmultiverse_blogsymfony3.categories;*/


/*SELECT * FROM entry_tags;*/

/*SELECT e.title, c.name FROM entries e, categories c WHERE e.id AND c.id=e.id;*/

/*SELECT t.name FROM tags t WHERE t.id in (
SELECT id FROM entry_tag WHERE entry_id=1) ORDER BY id DESC; */



