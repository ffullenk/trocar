CREATE TABLE category (id BIGINT AUTO_INCREMENT, id_root BIGINT, name VARCHAR(50), INDEX id_root_idx (id_root), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE have_list (id BIGINT AUTO_INCREMENT, product_id BIGINT NOT NULL, object_id BIGINT, user_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX product_id_idx (product_id), INDEX object_id_idx (object_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE object (id BIGINT AUTO_INCREMENT, status VARCHAR(45), detail VARCHAR(150), picture VARCHAR(200), weight BIGINT, height BIGINT, width BIGINT, lenght BIGINT, is_new TINYINT(1), color VARCHAR(45), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE product (id BIGINT AUTO_INCREMENT, id_category BIGINT, name VARCHAR(45), description VARCHAR(150), picture VARCHAR(200), link VARCHAR(45), brand VARCHAR(45), model VARCHAR(45), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX id_category_idx (id_category), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE want_list (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, product_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX product_id_idx (product_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE groups (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE groups_permissions (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE permissions (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user_login (id BIGINT AUTO_INCREMENT, username VARCHAR(255) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
CREATE TABLE user_profile (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, first_name VARCHAR(150), last_name VARCHAR(150), address VARCHAR(100), token VARCHAR(32), facebook_uid VARCHAR(20), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE category ADD CONSTRAINT category_id_root_category_id FOREIGN KEY (id_root) REFERENCES category(id);
ALTER TABLE have_list ADD CONSTRAINT have_list_user_id_user_login_id FOREIGN KEY (user_id) REFERENCES user_login(id) ON DELETE CASCADE;
ALTER TABLE have_list ADD CONSTRAINT have_list_product_id_product_id FOREIGN KEY (product_id) REFERENCES product(id);
ALTER TABLE have_list ADD CONSTRAINT have_list_object_id_object_id FOREIGN KEY (object_id) REFERENCES object(id);
ALTER TABLE product ADD CONSTRAINT product_id_category_category_id FOREIGN KEY (id_category) REFERENCES category(id);
ALTER TABLE want_list ADD CONSTRAINT want_list_user_id_user_login_id FOREIGN KEY (user_id) REFERENCES user_login(id) ON DELETE CASCADE;
ALTER TABLE want_list ADD CONSTRAINT want_list_product_id_product_id FOREIGN KEY (product_id) REFERENCES product(id);
ALTER TABLE forgot_password ADD CONSTRAINT forgot_password_user_id_user_login_id FOREIGN KEY (user_id) REFERENCES user_login(id) ON DELETE CASCADE;
ALTER TABLE groups_permissions ADD CONSTRAINT groups_permissions_permission_id_permissions_id FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE;
ALTER TABLE groups_permissions ADD CONSTRAINT groups_permissions_group_id_groups_id FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE CASCADE;
ALTER TABLE remember_key ADD CONSTRAINT remember_key_user_id_user_login_id FOREIGN KEY (user_id) REFERENCES user_login(id) ON DELETE CASCADE;
ALTER TABLE user_group ADD CONSTRAINT user_group_user_id_user_login_id FOREIGN KEY (user_id) REFERENCES user_login(id) ON DELETE CASCADE;
ALTER TABLE user_group ADD CONSTRAINT user_group_group_id_groups_id FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE CASCADE;
ALTER TABLE user_permission ADD CONSTRAINT user_permission_user_id_user_login_id FOREIGN KEY (user_id) REFERENCES user_login(id) ON DELETE CASCADE;
ALTER TABLE user_permission ADD CONSTRAINT user_permission_permission_id_permissions_id FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE;
ALTER TABLE user_profile ADD CONSTRAINT user_profile_user_id_user_login_id FOREIGN KEY (user_id) REFERENCES user_login(id) ON DELETE CASCADE;
