
**Users**

```

CREATE TABLE Users (
    user_id INT NOT NULL AUTO_INCREMENT,
    fname VARCHAR(255),
    lname VARCHAR(255),
    password VARCHAR(255),
    username VARCHAR(255),
    email VARCHAR(255),
    a_m VARCHAR(255),
    tel VARCHAR(255),
    PRIMARY KEY (user_id)
);

```

**User_t**

```

CREATE TABLE User_t (
    user_type_id INT,
    user_type INT,
    FOREIGN KEY (user_type_id) REFERENCES Users (user_id)
);

```

**Dates**

```

CREATE TABLE dates (
    date_from DATE,
    date_to DATE,
    enable INT 
);


```

**applications**

```

CREATE TABLE applications (
    application_id INT NOT NULL AUTO_INCREMENT,
    passed_courses INT,
    average_passed_courses INT,
    english_certificate VARCHAR(255),
    foreign_languages VARCHAR(255),
    first_uni VARCHAR(255),
    second_uni VARCHAR(255),
    third_uni VARCHAR(255),
    transcript TEXT,
    english_degree TEXT,
    other_degrees TEXT,
    tick_box INT,
    PRIMARY KEY (application_id)
);


```


**fill**

```

CREATE TABLE fill (
    user_id INT,
    application_id INT,
    FOREIGN KEY (user_id) REFERENCES Users (user_id),
    FOREIGN KEY (application_id) REFERENCES applications (application_id)
);

```

**Universities**

```

CREATE TABLE Universities (
    university_id INT NOT NULL AUTO_INCREMENT,
    university_name VARCHAR(255),
    country VARCHAR(255),
    PRIMARY KEY (university_id)
);


```