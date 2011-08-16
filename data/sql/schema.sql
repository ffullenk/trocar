CREATE TABLE category (id BIGINT AUTO_INCREMENT, id_root BIGINT, name VARCHAR(50), INDEX id_root_idx (id_root), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE have_list (id BIGINT AUTO_INCREMENT, product_id BIGINT NOT NULL, object_id BIGINT, user_id BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX product_id_idx (product_id), INDEX object_id_idx (object_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE object (id BIGINT AUTO_INCREMENT, status VARCHAR(45), detail VARCHAR(255), picture VARCHAR(200), weight BIGINT, height BIGINT, width BIGINT, lenght BIGINT, color VARCHAR(45), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE product (id BIGINT AUTO_INCREMENT, id_category BIGINT, name VARCHAR(45), description VARCHAR(150), picture VARCHAR(200), link VARCHAR(45), youtube VARCHAR(100), brand VARCHAR(45), model VARCHAR(45), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX id_category_idx (id_category), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE rate (id BIGINT AUTO_INCREMENT, user_rated_id BIGINT NOT NULL, user_rater_id BIGINT NOT NULL, trade_id BIGINT NOT NULL, feedback FLOAT(18, 2), satisfaction FLOAT(18, 2), credibility FLOAT(18, 2), text VARCHAR(150), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX rate__uniq_idx (user_rated_id, user_rater_id, trade_id), INDEX user_rated_id_idx (user_rated_id), INDEX user_rater_id_idx (user_rater_id), INDEX trade_id_idx (trade_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE reputation (id BIGINT AUTO_INCREMENT, user_id BIGINT, reputation FLOAT(18, 2), num_trades BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX reputation_user_uniq_idx (user_id), PRIMARY KEY(id, user_id)) ENGINE = INNODB;
CREATE TABLE trade (id BIGINT AUTO_INCREMENT, have_from_id BIGINT, have_to_id BIGINT, user_1_id BIGINT, user_2_id BIGINT, state VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX trade_have_uniq_idx (have_from_id, have_to_id), UNIQUE INDEX trade_user_uniq_idx (user_1_id, user_2_id), INDEX have_from_id_idx (have_from_id), INDEX have_to_id_idx (have_to_id), INDEX user_1_id_idx (user_1_id), INDEX user_2_id_idx (user_2_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE want_list (id BIGINT AUTO_INCREMENT, user_id BIGINT, product_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id, user_id, product_id)) ENGINE = INNODB;
CREATE TABLE forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE groups (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE groups_permissions (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE permissions (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user_login (id BIGINT AUTO_INCREMENT, username VARCHAR(255) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
CREATE TABLE user_profile (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, first_name VARCHAR(150), last_name VARCHAR(150), address VARCHAR(100), picture VARCHAR(32), token VARCHAR(32), facebook_uid VARCHAR(20), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE category ADD CONSTRAINT category_id_root_category_id FOREIGN KEY (id_root) REFERENCES category(id);
ALTER TABLE have_list ADD CONSTRAINT have_list_user_id_user_login_id FOREIGN KEY (user_id) REFERENCES user_login(id) ON DELETE CASCADE;
ALTER TABLE have_list ADD CONSTRAINT have_list_product_id_product_id FOREIGN KEY (product_id) REFERENCES product(id);
ALTER TABLE have_list ADD CONSTRAINT have_list_object_id_object_id FOREIGN KEY (object_id) REFERENCES object(id);
ALTER TABLE product ADD CONSTRAINT product_id_category_category_id FOREIGN KEY (id_category) REFERENCES category(id);
ALTER TABLE rate ADD CONSTRAINT rate_user_rater_id_user_login_id FOREIGN KEY (user_rater_id) REFERENCES user_login(id) ON DELETE CASCADE;
ALTER TABLE rate ADD CONSTRAINT rate_user_rated_id_user_login_id FOREIGN KEY (user_rated_id) REFERENCES user_login(id) ON DELETE CASCADE;
ALTER TABLE rate ADD CONSTRAINT rate_trade_id_trade_id FOREIGN KEY (trade_id) REFERENCES trade(id);
ALTER TABLE reputation ADD CONSTRAINT reputation_user_id_user_login_id FOREIGN KEY (user_id) REFERENCES user_login(id) ON DELETE CASCADE;
ALTER TABLE trade ADD CONSTRAINT trade_user_2_id_user_login_id FOREIGN KEY (user_2_id) REFERENCES user_login(id);
ALTER TABLE trade ADD CONSTRAINT trade_user_1_id_user_login_id FOREIGN KEY (user_1_id) REFERENCES user_login(id);
ALTER TABLE trade ADD CONSTRAINT trade_have_to_id_have_list_id FOREIGN KEY (have_to_id) REFERENCES have_list(id) ON DELETE CASCADE;
ALTER TABLE trade ADD CONSTRAINT trade_have_from_id_have_list_id FOREIGN KEY (have_from_id) REFERENCES have_list(id) ON DELETE CASCADE;
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
