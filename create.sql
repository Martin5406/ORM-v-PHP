CREATE TABLE manufacturers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    manufacturer_name VARCHAR(255) NOT NULL
);

CREATE TABLE models (
    id INT AUTO_INCREMENT PRIMARY KEY,
    model_name VARCHAR(255) NOT NULL,
    id_manufacturer INT,
    FOREIGN KEY (id_manufacturer) REFERENCES manufacturers(id)
);

CREATE TABLE owners (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    email VARCHAR(255)
);

CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vin_code VARCHAR(255),
    engine_model VARCHAR(255),
    manufactured_in INT,
    id_model INT,
    id_owner INT,
    FOREIGN KEY (id_model) REFERENCES models(id),
    FOREIGN KEY (id_owner) REFERENCES owners(id)
);
