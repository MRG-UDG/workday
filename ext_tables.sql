CREATE TABLE tx_workday_domain_model_job (
    title varchar(255) DEFAULT '' NOT NULL,
    description text,
    location varchar(255) DEFAULT '' NOT NULL,
    salary varchar(255) DEFAULT '' NOT NULL,
    job_type varchar(255) DEFAULT '' NOT NULL,
    workday_id varchar(255) DEFAULT '' NOT NULL,
    application_link varchar(255) DEFAULT '' NOT NULL
);
