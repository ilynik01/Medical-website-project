CREATE TABLE IF NOT EXISTS medical_data (
    ID bigint PRIMARY KEY AUTO_INCREMENT,
    oxygen_in_blood INT NOT NULL,
    heart_rate INT NOT NULL,
    blood_pressure_systolic INT NOT NULL,
    blood_pressure_diastolic INT NOT NULL,
    hemoglobin DECIMAL (3,1) NOT NULL,
    temperature DECIMAL (3,1) NOT NULL,
    user_id bigint NOT NULL,
    created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    updated_at datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    FOREIGN KEY (user_id )REFERENCES account_data(ID)
);