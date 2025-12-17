CREATE TABLE customers (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla: project_type
CREATE TABLE project_type (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

-- Tabla: status_tasks
CREATE TABLE status_tasks (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

-- Primero crear la tabla SIN las foreign keys
CREATE TABLE projects (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    location VARCHAR(200),
    customer_id INT NOT NULL,
    project_type_id INT NOT NULL
) ENGINE=InnoDB;

-- Luego agregar las foreign keys
ALTER TABLE projects 
ADD CONSTRAINT fk_projects_customers 
FOREIGN KEY (customer_id) 
REFERENCES customers(id) 
ON DELETE RESTRICT;

ALTER TABLE projects 
ADD CONSTRAINT fk_projects_project_type 
FOREIGN KEY (project_type_id) 
REFERENCES project_type(id) 
ON DELETE RESTRICT;

-- Tabla: tasks
CREATE TABLE tasks (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE,
    status_task_id INT NOT NULL,
    CONSTRAINT fk_tasks_projects 
        FOREIGN KEY (project_id) 
        REFERENCES projects(id) 
        ON DELETE CASCADE,
    CONSTRAINT fk_tasks_status_tasks 
        FOREIGN KEY (status_task_id) 
        REFERENCES status_tasks(id) 
        ON DELETE RESTRICT,
    CONSTRAINT chk_dates CHECK (end_date IS NULL OR end_date >= start_date)
) ENGINE=InnoDB;