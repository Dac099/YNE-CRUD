<?php
namespace Dac099\YneCrud\Util;

class Constansts
{
    public static string $database = "
        CREATE DATABASE IF NOT EXISTS inventory
    ";

    public static string $useDB = "
        USE inventory
    ";
    public static string $productTable = "
        CREATE TABLE IF NOT EXISTS Product (
            ProductId VARCHAR(36) PRIMARY KEY,
            Name VARCHAR(255) NOT NULL,
            Price FLOAT NOT NULL,
            CategoryId VARCHAR(36) NOT NULL,
            Description TEXT NOT NULL,
            WarehouseId VARCHAR(36) NOT NULL,
            CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            CreatedBy VARCHAR(36) NOT NULL,
            UpdatedBy VARCHAR(36) DEFAULT NULL,
            IsActive TINYINT(1) NOT NULL DEFAULT 1,
            FOREIGN KEY (CreatedBy) REFERENCES User (UserId) ON DELETE NO ACTION,
            FOREIGN KEY (UpdatedBy) REFERENCES User (UserId) ON DELETE NO ACTION,
            FOREIGN KEY (CategoryId) REFERENCES Category (CategoryId) ON DELETE NO ACTION,
            FOREIGN KEY (WarehouseId) REFERENCES Warehouse (WarehouseId) ON DELETE NO ACTION                                
        )
    ";

    public static string $categoryTable = "
        CREATE TABLE IF NOT EXISTS Category (
            CategoryId VARCHAR(36) PRIMARY KEY,
            Title VARCHAR(100) NOT NULL,
            CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            CreatedBy VARCHAR(36) NOT NULL,
            UpdatedBy VARCHAR(36) DEFAULT NULL,
            FOREIGN KEY (CreatedBy) REFERENCES User (UserId) ON DELETE NO ACTION,
            FOREIGN KEY (UpdatedBy) REFERENCES User (UserId) ON DELETE NO ACTION
        )
    ";

    public static string $warehouseTable = "
        CREATE TABLE IF NOT EXISTS Warehouse (
            WarehouseId VARCHAR(36) PRIMARY KEY,
            Name VARCHAR(100) NOT NULL,
            Address VARCHAR(255) DEFAULT 'No se menciona',
            CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            CreatedBy VARCHAR(36) NOT NULL,
            UpdatedBy VARCHAR(36) DEFAULT NULL,
            FOREIGN KEY (CreatedBy) REFERENCES User (UserId) ON DELETE NO ACTION,
            FOREIGN KEY (UpdatedBy) REFERENCES User (UserId) ON DELETE NO ACTION
        )
    ";

    public static string $userTable = "
        CREATE TABLE IF NOT EXISTS User (
            UserId VARCHAR(36) PRIMARY KEY,
            Name VARCHAR(100) NOT NULL,
            Email VARCHAR(100) NOT NULL UNIQUE,
            Password VARCHAR(255) NOT NULL,
            isAdmin TINYINT(1) NOT NULL DEFAULT 0,
            CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

    public static string $userLogsTable = "
        CREATE TABLE IF NOT EXISTS UserLogs (
            LogId VARCHAR(36) PRIMARY KEY,
            UserId VARCHAR(36) NOT NULL,
            AdminId VARCHAR(36) NOT NULL,
            Description TEXT NOT NULL,
            CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (UserId) REFERENCES User (UserId) ON DELETE NO ACTION,
            FOREIGN KEY (UserId) REFERENCES User (UserId) ON DELETE NO ACTION
        )
    ";

    public static string $WarehouseLogsTable = "
        CREATE TABLE IF NOT EXISTS WarehouseLogs (
            LogId VARCHAR(36) PRIMARY KEY,
            UserId VARCHAR(36) NOT NULL,
            WarehouseId VARCHAR(36) NOT NULL,
            Description TEXT NOT NULL,
            CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (UserId) REFERENCES User (UserId) ON DELETE NO ACTION,
            FOREIGN KEY (WarehouseId) REFERENCES Warehouse (WarehouseId) ON DELETE NO ACTION
        )
    ";

    public static string $CategoryLogsTable = "
        CREATE TABLE IF NOT EXISTS CategoryLogs (
            LogId VARCHAR(36) PRIMARY KEY,
            UserId VARCHAR(36) NOT NULL,
            CategoryId VARCHAR(36) NOT NULL,
            Description TEXT NOT NULL,
            CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (UserId) REFERENCES User (UserId) ON DELETE NO ACTION,
            FOREIGN KEY (CategoryId) REFERENCES Category (CategoryId) ON DELETE NO ACTION
        )
    ";

    public static string $productLogsTable = "
        CREATE TABLE IF NOT EXISTS ProductLogs (
            LogId VARCHAR(36) PRIMARY KEY,
            UserId VARCHAR(36) NOT NULL,
            ProductId VARCHAR(36) NOT NULL,
            Description TEXT NOT NULL,
            CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (UserId) REFERENCES User (UserId) ON DELETE NO ACTION,
            FOREIGN KEY (ProductId) REFERENCES Product (ProductId) ON DELETE NO ACTION
        )
    ";
}