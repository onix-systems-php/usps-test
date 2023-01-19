CREATE TABLE addresses
(
    id             INT AUTO_INCREMENT primary key NOT NULL,
    address_line_1 varchar(255) NOT NULL,
    address_line_2 varchar(255) NOT NULL,
    city           varchar(255) NOT NULL,
    state          varchar(255) NOT NULL,
    zip_code       varchar(255) NOT NULL
);