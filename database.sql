-- Create database

CREATE DATABASE IF NOT EXISTS budget_buddy;

-- Use the database

USE budget_buddy;

-- Create Users Table

CREATE TABLE IF NOT EXISTS users(
    email VARCHAR(70),
    password VARCHAR(50),
    name VARCHAR(50),
    mobile VARCHAR(15)
);

-- Create Expenses Table

CREATE TABLE IF NOT EXISTS expenses(
    name VARCHAR(100),
    email VARCHAR(50),
    description TEXT,
    category VARCHAR(20),
    time VARCHAR(30),
    amount VARCHAR(7)
);

-- Create Income Table

CREATE TABLE IF NOT EXISTS income(
    name VARCHAR(100),
    email VARCHAR(50),
    description TEXT,
    category VARCHAR(20),
    time VARCHAR(30),
    amount VARCHAR(7)
);

-- Create Contact Us Table

CREATE TABLE IF NOT EXISTS contact(
    email VARCHAR(55),
    name VARCHAR(30),
    mobile VARCHAR(15),
    subject VARCHAR(50),
    description TEXT
);

-- EOF --
