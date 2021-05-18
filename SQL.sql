
create database Mobile_shop1 CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use Mobile_shop1;
create table `user`
(
user_id int primary key auto_increment,
user_fullname varchar(255),
user_mail varchar(255),
user_pass varchar(255),
user_salt varchar(255),
user_level int 
);
create table category
(
cat_id int primary key auto_increment,
cat_name varchar(255)
);

create table product 
(
prd_id int primary key auto_increment,
cat_id int,
foreign  key (cat_id) references category(cat_id),
prd_name varchar(255),
prd_image varchar(255),
prd_price int,
prd_warranty varchar(255),
prd_accessories varchar(255),
prd_new varchar(255),
prd_promotion varchar(255),
prd_status int ,
prd_featured int,
prd_details text

);
create table `comment` (
  comm_id int NOT NULL primary key auto_increment,
  prd_id int NOT NULL,
  comm_name varchar(255) NOT NULL,
  comm_mail varchar(255) NOT NULL,
  comm_date datetime NOT NULL,
  comm_details text NOT NULL
);

create table Bill 
(
bill_id int not null,
buyer_name varchar(255),
buyer_name_phone varchar(20),
buyer_name_mail varchar(255),
buyer_name_adr varchar(255),
prd_id int,
foreign key(prd_id) references product (prd_id),
amount int ,
purchase_time date,
primary key(bill_id,prd_id)
);

-- Nhập dữ liệu vào Category
insert into category (cat_name)
values('APPLE'),
('SAMSUNG'),
('OPPO'),
('XIAOMI'),
('HUAWEI'),
('VIVO');
select * from category;

-- Nhập dữ liệu vào Product
select *from product;

-- Sản phẩm iPhone
INSERT INTO product (cat_id, prd_name, prd_image, prd_price, prd_warranty, prd_accessories, prd_new,prd_promotion, prd_status, prd_featured, prd_details) VALUES
(1, 'Apple iPhone 11 pro-64GB', 'Apple iPhone 11 pro-64GB.png', 24990000, '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết, các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(1, 'Apple iPhone 8 Plus 32GB Rose Gold', 'Apple iPhone8-Plus-32GB-Rose-Gold.png', 12000000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(1, 'Apple iPhone XS  256GB ', 'Apple iPhone XSPlus-256GB.png', 27890000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(1, 'Apple iPhone XS Max Plus 64GB ', 'Apple iPhone XS Max Plus.png', 24000000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(1, 'Apple iPhone XS- 512GB', 'Apple iPhone XS- 512GB.png', 28490000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(1, 'Apple iPhone XR-128GB', 'Apple iPhone XR-128GB.png', 21000000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(1, 'Apple iPhone XS Max- 512GB', 'Apple iPhone XS Max- 512GB.png', 23500000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(1, 'Apple iPhone XR-128GB', 'Apple iPhone XR-128GB.png', 21500000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(1, 'Apple iPhone XS Max-64GB', 'Apple iPhone XS Max-64GB.png', 24990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (1, 'Apple iPhone 7 plus', 'temp.jpg', 10000000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.');
 
 -- Sản phẩm của Samsung
INSERT INTO product (cat_id, prd_name, prd_image, prd_price, prd_warranty, prd_accessories, prd_new,prd_promotion, prd_status, prd_featured, prd_details) VALUES
(2, 'Samsung Galaxy S10 Plus', 'Samsung Galaxy S10 Plus.png', 20490000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(2, 'Samsung Galaxy Note 10 ', 'Samsung Galaxy Note 10.png', 18790000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(2, 'Samsung Galaxy S10  Plus', 'Samsung Galaxy S10 Plus.png', 19890000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(2, 'Samsung Galaxy A70 ', 'Samsung Galaxy A70.png', 7750000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (2, 'Samsung Galaxy Note 10-512GB', 'Samsung Galaxy Note 10-512GB.png', 21490000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (2, 'Samsung Galaxy 10 Plus-White', 'Samsung Galaxy  10 Plus-White.png', 17990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (2, 'Samsung Galaxy 10 Plus-Black', 'Samsung Galaxy 10 Plus-Black.png', 17990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (2, 'Samsung Galaxy  S10e', 'Samsung Galaxy S10e.png', 14690000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.');
 
 -- Sản phẩm của Oppo
INSERT INTO product (cat_id, prd_name, prd_image, prd_price, prd_warranty, prd_accessories, prd_new,prd_promotion, prd_status, prd_featured, prd_details) VALUES
(3, 'Oppo Reno 2', 'temp.jpg', 14990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (3, 'Oppo Reno 2F', 'temp.jpg', 8990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (3, 'Oppo F11', 'temp.jpg', 5690000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (3, 'Oppo Reno', 'temp.jpg', 9690000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (3, 'Oppo F11 Pro', 'temp.jpg', 6690000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (3, 'Oppo A9 2020', 'temp.jpg', 6990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (3, 'Oppo Reno 10x room', 'temp.jpg', 18990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (3, 'Oppo A5 2020 - 4GB', 'temp.jpg', 5690000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (3, 'Oppo A9', 'temp.jpg', 5000000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.');
 
 -- Sản phầm của Xiaomi
INSERT INTO product (cat_id, prd_name, prd_image, prd_price, prd_warranty, prd_accessories, prd_new,prd_promotion, prd_status, prd_featured, prd_details) VALUES
(4, 'Xiaomi Redmi 8 4GB/64GB', 'temp.jpg', 4500000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (4, 'Xiaomi Mi A3 4GB/64GB', 'temp.jpg', 4450000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (4, 'Xiaomi Redmi Note 7 - 3GB/32GB ', 'temp.jpg', 3500000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (4, 'Xiaomi Redmi Note 7 - 4GB/64GB', 'temp.jpg', 4000000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (4, 'Xiaomi Redmi Note 7 - 4GB/128GB', 'temp.jpg', 4990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (4, 'Xiaomi Mi 8 Lite RAM 6GB - ROM 128GB - Black', 'temp.jpg', 4100000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (4, 'Xiaomi Redmi Note 8 Pro - 6GB/128GB - Black', 'temp.jpg', 5690000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (4, 'Xiaomi Redmi Note 8 Pro - 6GB/128GB ', 'temp.jpg', 5100000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (4, 'Xiaomi Redmi Note 8 - 4GB/128GB ', 'temp.jpg', 5060000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (4, 'Xiaomi Redmi Note 8 Pro - 6GB/64GB', 'temp.jpg', 5990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.');
 
 -- Sản phẩm của HuaWei
INSERT INTO product (cat_id, prd_name, prd_image, prd_price, prd_warranty, prd_accessories, prd_new,prd_promotion, prd_status, prd_featured, prd_details) VALUES
(5, 'Huawei P30 Pro', 'temp.jpg', 19540000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(5, 'Huawei Mate 20 Pro ', 'temp.jpg', 13990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(5, 'Huawei Mate 20 ', 'temp.jpg', 15990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
(5, 'Huawei P20 Pro', 'temp.jpg', 17990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (5, 'Huawei Y9 Prime 2019', 'temp.jpg', 5990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (5, 'Huawei P30 Lite ', 'temp.jpg', 4990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (5, 'Huawei nova 3i ', 'temp.jpg', 5990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (5, 'Huawei Y9 2019 ', 'temp.jpg', 4990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (5, 'Huawei nova 3e ', 'temp.jpg', 6990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (5, 'Huawei Nova 5T', 'temp.jpg', 4990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.');
 
-- Sản phẩm của vivo

INSERT INTO product (cat_id, prd_name, prd_image, prd_price, prd_warranty, prd_accessories, prd_new,prd_promotion, prd_status, prd_featured, prd_details) VALUES
(6, 'Vivo V15 128GB', 'temp.jpg', 6990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (6, 'Vivo V9', 'temp.jpg', 5990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (6, 'Vivo V11i', 'temp.jpg', 4990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (6, 'Vivo S1', 'temp.jpg', 6490000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (6, 'Vivo Y15', 'temp.jpg', 4790000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (6, 'Vivo V17 Pro', 'temp.jpg', 9990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (6, 'Vivo Y12', 'temp.jpg', 4190000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (6, 'Vivo Y91', 'temp.jpg', 3990000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (6, 'Vivo Y93', 'temp.jpg', 3790000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.'),
 (6, 'Vivo V9 Youth', 'temp.jpg', 4950000, '12 Tháng', 
'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 4D', 1, 1, 'Sản phẩm này chúng tôi đang cập nhật nội dung chi tiết,
 các bạn có thể qua trực tiếp cửa hàng để xem sản phẩm, vì hàng chúng tôi luôn có sẵn.');

-- Nhập dữ liệu đơn hàng
 select *from Bill;

INSERT INTO Bill (bill_id, buyer_name, buyer_name_phone, buyer_name_mail,buyer_name_adr, prd_id, amount, purchase_time) VALUES
(100,'Nguyễn Văn Thuận',0932432311,'nvt@gmail.com','Mỗ Lao-Hà Đông-Hà Nội',1,2,'20191019'),
(100,'Nguyễn Văn Thuận',0932432311,'nvt@gmail.com','Mỗ Lao-Hà Đông-Hà Nội',6,2,'20191019'),
(101,'Nguyễn Văn Hùng',064552392,'nvh@gmail.com','Trần Phú-Hà Đông-Hà Nội',21,3,'20191018'),
(102,'Nguyễn Tuấn Anh',0832432622,'nta@gmail.com','Cầu Diễn-Từ Liêm-Hà Nội',22,1,'20191017'),
(103,'Hoàng Văn Khải',0732432522,'hvk@gmail.com','Phú Diễn-Từ Liêm-Hà Nội',37,2,'20191016'),
(104,'Hoàng Bá  Sơn',0582432312,'hbs@gmail.com','Cổ Nhuế-Từ Liêm-Hà Nội',55,3,'20191015'),
(105,'Nguyễn Thị Bé',0472432322,'ntb@gmail.com','Nhật Tân-Ba Đình-Hà Nội',12,1,'20190909'),
(106,'Hoàng Hải My',0342432912,'hhm@gmail.com','Linh Đàm-Đống Đa-Hà Nội',44,2,'20190829'),
(107,'Trần Quốc Toản',0262432822,'tqt@gmail.com','Giải Phóng-Đống Đa-Hà Nội',42,3,'20190720'),
(108,'Lê Bá Vương',0182732392,'lbv@gmail.com','Khương Đình-Hai Bà Trưng-Hà Nội',5,5,'20190912'),
(109,'Phạm Hải Lương',0932482322,'phl@gmail.com','Thái Bình-Mỹ Đình-Hà Nội',6,4,'20190811');

-- Nhập dữ liệu cho user
INSERT INTO `user` (`user_id`, `user_fullname`, `user_mail`, `user_pass`, `user_level`, `user_salt`) VALUES
(1, 'Administrator', 'admin@gmail.com', '6e43ac7c30cf0c9d9858253e996cb87c', 1, 'xyz');

-- Nhập dữ liệu cho bình luận
INSERT INTO `comment` (`prd_id`, `comm_name`, `comm_mail`, `comm_date`, `comm_details`) VALUES
(1, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(2, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(3, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(4, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(5, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(6, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(7, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(8, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(9, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời'),
(10, 'Nguyễn Văn A', 'nguyenvana@gmail.com', '2018-12-12 20:59:56', 'Đây thực sự là một sản phẩm tuyệt vời');
