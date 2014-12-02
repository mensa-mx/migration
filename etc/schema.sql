CREATE SEQUENCE seq_member_id INCREMENT BY 1 MINVALUE 1 START 1;

CREATE TABLE members (
    id              INT             NOT NULL    DEFAULT nextval('seq_member_id'),
    firstName       VARCHAR(100)    NOT NULL,
    lastName        VARCHAR(100)    NOT NULL,
    birthdate       DATE            NOT NULL,
    email           VARCHAR(255)    NOT NULL,
    admission_type  VARCHAR(50)     NOT NULL,

    PRIMARY KEY(id)
);
