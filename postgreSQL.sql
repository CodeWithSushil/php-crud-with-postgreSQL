-- Adminer 4.8.2-dev PostgreSQL 15.3 dump
CREATE DATABASE "CRUD";
\connect "CRUD";

CREATE SEQUENCE test_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 24 CACHE 1;

CREATE TABLE "public"."CRUD" (
    "id" integer DEFAULT nextval('test_id_seq') NOT NULL,
    "name" character(255) NOT NULL,
    "email" character(255) NOT NULL,
    CONSTRAINT "test_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


-- 2023-08-28 07:49:43.672749+05:30
