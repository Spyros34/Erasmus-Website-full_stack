
**Users**

```

CREATE TABLE Users (
    user_id : int NOT NULL , 
    fname : varchar(255) ,
    lname : varchar(255) ,
    password : varchar(255) ,
    username : varchar(255) ,
    email : varchar(255) ,
    a_m : varchar(255) , 
    PRIMARY KEY (user_id)
);

```

**User_t**

```

CREATE TABLE User_t(
    user_type_id int,
    user_type int, 
    FOREIGN KEY (user_type_id) REFERENCE User(user_id)
);

```

**applications**

```

CREATE TABLE applications (
    application_id : int NOT NULL , 
    passed_courses : int ,
    average_passed_courses : int ,
    english_certificate : varchar(255) ,
    foreign_languages : varchar(255) ,
    first_uni : varchar(255) ,
    second_uni : varchar(255) , 
    third_uni : varchar(255) , 
    transcript : text , 
    english_degree : text ,
    other_degrees : text , 
    tick_box : int ,  
    PRIMARY KEY (application_id )
);

```


**fill**

```

CREATE TABLE fill(
    user_id int,
    application_id int, 
    FOREIGN KEY (user_id) REFERENCE User(user_id),
    FOREIGN KEY (application_id) REFERENCE applications(application_id)
);

```

**Universities**

```

CREATE TABLE Universities (
    university_id : int NOT NULL , 
    university_name : varchar(255) ,
    country : varchar(255) ,
    PRIMARY KEY (university_id)
);

```