CREATE TABLE IF NOT EXISTS account_data (
        ID bigint PRIMARY KEY AUTO_INCREMENT,
        first_name varchar(255) NOT NULL,
        last_name varchar(255) NOT NULL,
        sex varchar(6) NOT NULL,
        phone varchar(15) NOT NULL UNIQUE,
        email varchar(255) NOT NULL UNIQUE,
        psw varchar(255) NOT NULL,
        is_admin tinyint(1) NOT NULL DEFAULT 0,
        created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP(),
        updated_at datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
);
