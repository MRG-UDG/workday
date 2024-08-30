CREATE TABLE tx_workday_domain_model_job (
    workday_id varchar(255) DEFAULT '' NOT NULL,
    title varchar(255) DEFAULT '' NOT NULL,
    description text,
    location varchar(255) DEFAULT '' NOT NULL,
    department varchar(255) DEFAULT '' NOT NULL,
    salary_range varchar(255) DEFAULT '' NOT NULL,
    application_deadline int(11) DEFAULT '0' NOT NULL,

    UNIQUE KEY workday_id (workday_id)
);
