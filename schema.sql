-- CREATE USER --
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    status TINYINT(1) NOT NULL DEFAULT 1,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- INSERT --
INSERT INTO user (first_name, last_name, gender, status, createdAt, updatedAt) VALUES
('John', 'Doe', 'Male', 1, NOW(), NOW()),
('Jane', 'Smith', 'Female', 1, NOW(), NOW()),
('Alice', 'Johnson', 'Female', 0, NOW(), NOW()),
('Bob', 'Brown', 'Male', 1, NOW(), NOW()),
('Charlie', 'Davis', 'Male', 0, NOW(), NOW()),
('Emily', 'Wilson', 'Female', 1, NOW(), NOW()),
('David', 'Clark', 'Male', 0, NOW(), NOW()),
('Sophia', 'Lewis', 'Female', 1, NOW(), NOW()),
('Chris', 'Walker', 'Male', 1, NOW(), NOW()),
('Olivia', 'Hall', 'Female', 0, NOW(), NOW());

